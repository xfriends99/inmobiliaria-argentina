<?php

namespace App\Http\Controllers;

use App\Services\TokkoAuth;
use App\Services\TokkoProperty;
use Illuminate\Http\Request;
use App\Repositories\UserShoppingCarRepository;
use Illuminate\Support\Facades\Auth;

class UserShoppingCarController extends Controller
{
    protected $shoppingCar;

    public function __construct(UserShoppingCarRepository $shoppingCar)
    {
        $this->shoppingCar = $shoppingCar;
    }

    public function index()
    {
        if (!Auth::check()){
            return redirect()->route('signin');
        }
        $properties = $this->shoppingCar->search(['user_id' => Auth::user()->id])->get();
        $auth = new TokkoAuth(env('API_KEY'));
        $data = [];
        $i = 0;
        foreach($properties as $pro){
            $data[] = ['property_id' => $pro->property_id, 'created_at' => $pro->created_at];
            $property = new TokkoProperty('id', $pro->property_id, $auth);
            $data[$i]['data'] = (array) $property->data;
            $data[$i]['object'] = $property;
            $i++;
        }
        return view('frontend.carrito', compact('data'));
    }

    public function store($id, Request $request)
    {
        if($this->shoppingCar->search(['property_id' => $id, 'user_id' => Auth::user()->id])->get()->first()){
            return redirect()->route('carrito');
        } else {
            $this->shoppingCar->create(['user_id' => Auth::user()->id, 'property_id' => $id]);
            return redirect()->route('carrito')->withSuccess('Propiedad agregada satisfactoriamente');
        }
    }

    public function delete($id)
    {
        $sho = $this->shoppingCar->search(['property_id' => $id, 'user_id' => Auth::user()->id])->get()->first();
        $sho->delete();
        return redirect()->back()->withSuccess('Propiedad borrada de la lista satisfactoriamente');
    }
}
