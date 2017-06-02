<?php

namespace App\Http\Controllers;

use App\Services\TokkoAuth;
use App\Services\TokkoPropertyTypes;
use App\Services\TokkoSearch;
use App\Services\TokkoSearchForm;
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
            $operacion = '[1,2,3]';
        }

        if(isset($request->keyword) && $request->keyword!=''){
            $data = '["location", "=", "'.$request->keyword.'"]';
        } else {
            $data = '';
        }
        $example_data = '{"current_localization_id":1,"current_localization_type":"country","price_from":1,"price_to":999999999999,"operation_types":'.$operacion.',
        "property_types":'.$property_types.',"currency":"USD","filters":['.$data.']}';
        $auth = new TokkoAuth(env('API_KEY'));
        $tokko_search = new TokkoSearch($auth, $example_data);
        $orden = null;
        $order_by = null;
        if(isset($request->orden)){
            if($request->orden==1){
                $orden = 'ASC';
                $order_by = 'price';
            } else if($request->orden==2){
                $orden = 'DESC';
                $order_by = 'price';
            } else {
                $orden = 'DESC';
                $order_by = 'age';
            }
        }

        if(isset($request->page)){
            $tokko_search->do_search_page($request->page, null, $order_by, $orden);
        } else {
            $tokko_search->do_search(null, $order_by, $orden);
        }
        /*$tokko = $tokko_search;
        $tokko->do_search_all(1000, $order_by, $orden);
        $filtros = $this->getFilterData($tokko->get_properties());
        return dd($filtros);*/
        $properties = $tokko_search->get_properties();
        $data_properties = [];
        $tokko_properties = new TokkoPropertyTypes($auth);
        foreach($tokko_properties->property_types as $p){
            $data_properties[$p->id.''] = $p->name;
        }
        $tokko_search_form = new TokkoSearchForm($auth);
        /*foreach($properties as $p){
            dd($p->data);
        }*/
        $map = false;
        if(isset($request->ord) && $request->ord=='row'){
            return view('frontend.search_row', compact('properties', 'tokko_search', 'request', 'data_properties', 'tokko_search_form', 'map'));
        } else if(isset($request->ord) && $request->ord=='map'){
            $map = true;
            return view('frontend.search_map', compact('properties', 'tokko_search', 'request', 'data_properties', 'tokko_search_form', 'map'));
        } else {
            return view('frontend.search', compact('properties', 'tokko_search', 'request', 'data_properties', 'tokko_search_form', 'map'));
        }
    }

    public function getFilterData($data)
    {
        return $data;
    }
}
