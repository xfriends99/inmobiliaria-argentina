<?php

namespace App\Http\Controllers;

use App\Repositories\UserShoppingCarRepository;
use App\Services\TokkoAuth;
use App\Services\TokkoDevelopment;
use App\Services\TokkoDevelopmentList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevelopmentController extends Controller
{
    protected $shoppingCar;

    public function __construct(UserShoppingCarRepository $shoppingCar)
    {
        $this->shoppingCar = $shoppingCar;
    }

    public function index(Request $request)
    {
        $auth = new TokkoAuth(env('API_KEY'));
        $offset = (isset($request->page)) ? ceil(($request->page-1) * 20) : 0;
        $development = new TokkoDevelopmentList($auth, 20, $offset);
        $data = $development->data;
        $current_page = (isset($request->page)) ? $request->page : 1;
        $pages = ceil($data->meta->total_count/20);
        return view('frontend.emprendimientos', compact('pages', 'current_page', 'data', 'development'));
    }

    public function show($id)
    {
        $auth = new TokkoAuth(env('API_KEY'));
        $property = new TokkoDevelopment('id', $id, $auth);
        if($property->data==''){
            abort(404);
        }
        $data = (array) $property->data;
        if (Auth::check()){
            $property_user = $this->shoppingCar->search(['property_id' => $id, 'user_id' => Auth::user()->id])->get()->first();
        } else {
            $property_user = false;
        }
        $data['publication_title'] = $data['name'];
        $emprendimiento = true;
        return view('frontend.propiedad', compact('emprendimiento', 'data', 'property', 'property_user'));
    }
}
