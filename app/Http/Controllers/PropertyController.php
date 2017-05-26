<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\TokkoAuth;
use App\Services\TokkoProperty;
use App\Services\TokkoWebContact;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function show($id)
    {
        $auth = new TokkoAuth(env('API_KEY'));
        $property = new TokkoProperty('id', $id, $auth);
        if($property->data==''){
            abort(404);
        }
        $data = (array) $property->data;
        return view('frontend.propiedad', compact('data', 'property'));
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
            $contact->send();
            return redirect()->route('thankyou');
        } catch(\Exception $e){
            return redirect()->back()->withErrors('Ocurrio un error intente de nuevo');
        }
    }

}
