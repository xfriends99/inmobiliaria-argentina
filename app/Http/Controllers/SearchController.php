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
        //dd($operacion);
        if(isset($request->keyword) && $request->keyword!=''){
            $data = '["location", "=", "'.$request->keyword.'"]';
        } else {
            $data = '';
        }
        if(isset($request->surfaces) && $request->surfaces!=''){
            $data .= ($data!='') ? ',' : '';
            if(substr($request->surfaces, -1) == ':'){
                $data .= '["total_surface",">",'.substr($request->surfaces, 0, strlen($request->surfaces)-1).']';
            } else if(substr($request->surfaces, 0, 1) == ':'){
                $data .= '["total_surface","<",'.substr($request->surfaces, 1).']';
            } else {
                $da = explode(':', $request->surfaces);
                $data .= '["total_surface",">",'.$da[0].'],["total_surface","<",'.$da[1].']';
            }
        }
        if(isset($request->parking_lot_amount) && $request->parking_lot_amount!=''){
            $data .= ($data!='') ? ',' : '';
            $data .= '["parking_lot_amount","=",'.$request->parking_lot_amount.']';
        }
        if(isset($request->tags) && $request->tags!=''){
            $tags = $request->tags;
        } else {
            $tags = '';
        }
        if(isset($request->preciodesde)){
            $price_from = $request->preciodesde;
        } else {
            $price_from = '';
        }
        if(isset($request->preciohasta)){
            $price_to = $request->preciohasta;
        } else {
            $price_to = '';
        }
        $example_data = '{"current_localization_id":0,"current_localization_type":"country","price_from":"'.$price_from.'","price_to":"'.$price_to.'","operation_types":'.$operacion.',
        "property_types":'.$property_types.',"currency":"ANY","filters":['.$data.'],"with_tags":['.$tags.']}';
        //return $example_data;
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
                $order_by = 'id';
            }
        }
        if(isset($request->ord) && $request->ord=='row'){
            $tokko_search->default_page_limit = 15;
        }
        if(isset($request->page)){
            $tokko_search->do_search_page($request->page, null, $order_by, $orden);
        } else {
            $tokko_search->do_search(null, $order_by, $orden);
        }
        //dd($tokko_search->get_summary_field('operation_types'));
        $locations = $tokko_search->get_summary_field('locations');
        $operations = $tokko_search->get_summary_field('operation_types');
        $total_surfaces = $tokko_search->get_summary_total_surface();
        $tags = $tokko_search->get_summary_field('tags');
        $tags_name = [];
        foreach($tags as $ta){
            $tags_name[$ta->tag_id] = $ta->tag_name;
        }
        /*
        if(isset($request->keyword)){
            $request['keyword'] = $locations[0]->location_name;
        }*/
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
            return view('frontend.search_row', compact('tags_name', 'tags', 'total_surfaces', 'operations', 'locations', 'properties', 'tokko_search', 'request', 'data_properties', 'tokko_search_form', 'map'));
        } else if(isset($request->ord) && $request->ord=='map'){
            $map = true;
            return view('frontend.search_map', compact('tags_name', 'tags', 'total_surfaces', 'operations', 'locations', 'properties', 'tokko_search', 'request', 'data_properties', 'tokko_search_form', 'map'));
        } else {
            return view('frontend.search', compact('tags_name', 'tags', 'total_surfaces', 'operations', 'locations', 'properties', 'tokko_search', 'request', 'data_properties', 'tokko_search_form', 'map'));
        }
    }

    public function quicksearch(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://tokkobroker.com/api/v1/location/quicksearch/?format=json&lang=es_ar&q='.$request->search);
        $data = json_decode($res->getBody());
        $response = [];
        foreach($data->objects as $d){
            $response[] = ['id' => $d->id, 'name' => $d->full_location];
        }
        return $response;
    }
}
