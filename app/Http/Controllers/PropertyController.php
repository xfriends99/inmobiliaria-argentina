<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\UserShoppingCarRepository;
use App\Services\TokkoAuth;
use App\Services\TokkoProperty;
use App\Services\TokkoWebContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    protected $shoppingCar;

    public function __construct(UserShoppingCarRepository $shoppingCar)
    {
        $this->shoppingCar = $shoppingCar;
    }

    public function show($id)
    {
        $auth = new TokkoAuth(env('API_KEY'));
        $property = new TokkoProperty('id', $id, $auth);
        if($property->data==''){
            abort(404);
        }
        $data = (array) $property->data;
        if (Auth::check()){
            $property_user = $this->shoppingCar->search(['property_id' => $id, 'user_id' => Auth::user()->id])->get()->first();
        } else {
            $property_user = false;
        }
        return view('frontend.propiedad', compact('data', 'property', 'property_user'));
    }

    public function contact(ContactRequest $request, $id)
    {
        $auth = new TokkoAuth(env('API_KEY'));
        $data = ['name' => $request->name,
                 'cellphone' => $request->phone,
                 'phone' => $request->phone,
                 'email' => $request->email,
                 'work_name' => '',
                 'text'     => '',
                 'properties' => [$id]];
        $contact = new TokkoWebContact($auth, $data);
        try{
            $response = $contact->send();
            if(!$response){
                return redirect()->back()->withErrors('Ocurrio un error intente de nuevo');
            }
            return redirect()->route('thankyou');
        } catch(\Exception $e){
            return redirect()->back()->withErrors('Ocurrio un error intente de nuevo');
        }
    }

}
