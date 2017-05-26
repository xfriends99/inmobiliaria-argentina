<?php

namespace App\Http\Controllers;

use App\Services\TokkoAuth;
use App\Services\TokkoSearch;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->propiedad) && $request->propiedad!=''){
            $property_types = '['.$request->propiedad.']';
        } else {
            $property_types = '[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]';
        }

        if(isset($request->operacion) && $request->operacion!=''){
            $operacion = '['.$request->operacion.']';
        } else {
            $operacion = '[1,2]';
        }

        if(isset($request->keyword) && $request->keyword!=''){
            $data = '["address", "like", "'.$request->keyword.'"]';
        } else {
            $data = '';
        }
        $example_data = '{"current_localization_id":1,"current_localization_type":"country","price_from":1,"price_to":999999999999,"operation_types":'.$operacion.',
        "property_types":'.$property_types.',"currency":"USD","filters":['.$data.']}';
        $auth = new TokkoAuth(env('API_KEY'));
        $tokko_search = new TokkoSearch($auth, $example_data);
        $tokko_search->do_search();
        $properties = $tokko_search->get_properties();
        /*foreach($properties as $p){
            dd($p->data->photos[0]->image);
        }*/
        if(isset($request->ord) && $request->ord=='row'){
            return view('frontend.search_row', compact('properties', 'tokko_search', 'request'));
        } else if(isset($request->ord) && $request->ord=='map'){
            return view('frontend.search_map', compact('properties', 'tokko_search', 'request'));
        } else {
            return view('frontend.search', compact('properties', 'tokko_search', 'request'));
        }
    }
}
