<?php

namespace App\Http\Controllers;

use App\Services\TokkoAuth;
use App\Services\TokkoPropertyTypes;
use App\Services\TokkoSearch;
use App\Services\TokkoSearchForm;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request, $ord = null)
    {
        if(isset($request->property_type) && $request->property_type!=''){
            $property_types = '['.$request->property_type.']';
        } else {
            $property_types = '[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]';
        }

        if(isset($request->operacion) && $request->operacion!=''){
            $operacion = '['.$request->operacion.']';
        } else {
            $operacion = '[1,2,3]';
        }
        //dd($operacion);
        $keywords = '';
        if(isset($request->keyword) && $request->keyword!=''){
            if(!preg_match('/[0-9],?/', $request->keyword)){
                $keywords = [];
                $keyword = $this->makeSearch($request->keyword);
                foreach($keyword->objects as $d){
                    $keywords[] = $d->id;
                }
                $keywords = implode(',', $keywords);
                $current_localization_id = '['.$keywords.']';
                $current_localization_type = 'division';
            } else {
                $current_localization_id = '['.$request->keyword.']';
                $current_localization_type = 'division';
                $keywords = $request->keyword;
            }
        } else {
            $current_localization_id = '1';
            $current_localization_type = 'country';
        }
        $data = '';
        $surfaces = '';
        if(isset($request->surfaces) && $request->surfaces!=''){
            $data = ($data!='') ? ',' : '';
            $surfaces_details =  $this->getSurfaces($request->surfaces);
            if(!$surfaces_details){
                $request['surfaces'] = '';
                $data .= '';
            } else {
                $surfaces = $surfaces_details['details'];
                $data .= $surfaces_details['filter'];
            }
        }
        if(isset($request->parking_lot_amount) && $request->parking_lot_amount!=''){
            $data = ($data!='') ? ',' : '';
            $data .= '["parking_lot_amount","=",'.$request->parking_lot_amount.']';
        }
        if(isset($request->room_amount) && $request->room_amount!=''){
            $data = ($data!='') ? ',' : '';
            $data .= '["room_amount","=",'.$request->room_amount.']';
        }
        if(isset($request->suite_amount) && $request->suite_amount!=''){
            $data = ($data!='') ? ',' : '';
            $data .= '["suite_amount","=",'.$request->suite_amount.']';
        }
        if(isset($request->age) && $request->age!=''){
            $data = ($data!='') ? ',' : '';
            $data .= '["age","=",'.$request->age.']';
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
        $example_data = '{"current_localization_id":'.$current_localization_id.',"current_localization_type":"'.$current_localization_type.'","price_from":"'.$price_from.'","price_to":"'.$price_to.'","operation_types":'.$operacion.',
        "property_types":'.$property_types.',"currency":"ANY","filters":['.$data.'],"with_tags":['.$tags.']}';
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
        if($ord!=null && $ord=='row'){
            $tokko_search->default_page_limit = 15;
        }
        if(isset($request->page)){
            $tokko_search->do_search_page($request->page, null, $order_by, $orden);
        } else {
            $tokko_search->do_search(null, $order_by, $orden);
        }
        $data_filter = $this->getFilterData();
        $property_types = $data_filter['properties'];
        $locations = $data_filter['locations'];
        $operations = $data_filter['operations'];
        $total_surfaces = $data_filter['total_surfaces'];
        $parkings = $data_filter['parking'];
        $room_amount = $data_filter['room_amount'];
        $suite_amount = $data_filter['suite_amount'];
        $age = $data_filter['age'];
        $tags = $this->order_tags($data_filter['tags']);
        $properties = $tokko_search->get_properties();
        $data_properties = [];
        $tokko_properties = new TokkoPropertyTypes($auth);
        foreach($tokko_properties->property_types as $p){
            $data_properties[$p->id.''] = $p->name;
        }
        $tokko_search_form = new TokkoSearchForm($auth);
        $map = false;
        if($ord!=null && $ord=='row'){
            $search = route('search', 'row');
            return view('frontend.search_row', compact('room_amount', 'suite_amount', 'age', 'keywords', 'property_types', 'search', 'ord', 'surfaces', 'parkings', 'tags', 'total_surfaces', 'operations', 'locations', 'properties', 'tokko_search', 'request', 'data_properties', 'tokko_search_form', 'map'));
        } else if($ord!=null && $ord=='map'){
            $search = route('search', 'map');
            $map = true;
            return view('frontend.search_map', compact('room_amount', 'suite_amount', 'age', 'keywords', 'search', 'ord', 'surfaces', 'parkings', 'tags', 'total_surfaces', 'operations', 'locations', 'properties', 'tokko_search', 'request', 'data_properties', 'tokko_search_form', 'map'));
        } else {
            $search = route('search');
            return view('frontend.search', compact('room_amount', 'suite_amount', 'age', 'keywords', 'property_types', 'search', 'ord', 'surfaces', 'parkings', 'tags', 'total_surfaces', 'operations', 'locations', 'properties', 'tokko_search', 'request', 'data_properties', 'tokko_search_form', 'map'));
        }
    }

    public function quicksearch(Request $request)
    {
        $data = $this->makeSearch($request->search);
        $response = [];
        foreach($data->objects as $d){
            $property_final = explode('|', $d->full_location);
            $property_final = $property_final[count($property_final)-2].' | '.$property_final[count($property_final)-1];
            $response[] = ['id' => $d->id, 'name' => $property_final];
        }
        return $response;
    }

    public function makeSearch($search)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://tokkobroker.com/api/v1/location/quicksearch/?format=json&lang=es_ar&q='.$search);
        $data = json_decode($res->getBody());
        return $data;
    }

    public function order_tags($tags)
    {
        $sort = [];
        $data = [];
        $response = [];
        foreach($tags as $t){
            $sort[] = $t->tag_name;
            $data[$t->tag_name] = $t;
        }
        asort($sort);
        foreach ($sort as $s){
            $response[$data[$s]->tag_id] = $data[$s];
        }
        return $response;

    }

    public function getFilterData()
    {
        $example_data = '{"current_localization_id":0,"current_localization_type":"country","price_from":"","price_to":"","operation_types":[1,2,3],
        "property_types":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25],"currency":"ANY","filters":[]}';
        $auth = new TokkoAuth(env('API_KEY'));
        $tokko_search = new TokkoSearch($auth, $example_data);
        $tokko_search->do_search(null, null, null);
        $locations_name = [];
        $locations = $tokko_search->get_summary_field('locations');
        foreach($locations as $locat){
            $locations_name[$locat->location_id] = $locat;
        }
        $operations = $tokko_search->get_summary_field('operation_types');
        $properties = [];
        $proper = $tokko_search->get_summary_field('property_types');
        $parking = $tokko_search->get_summary_field('parking_lot_amount');
        $total_surfaces = $tokko_search->get_summary_total_surface();
        $tags = $this->order_tags($tokko_search->get_summary_field('tags'));
        $room_amount = $tokko_search->get_summary_field('room_amount');
        $suite_amount =  $tokko_search->get_summary_field('suite_amount');
        $age = $tokko_search->get_summary_field('age');
        $tags_name = [];
        foreach($tags as $ta){
            $tags_name[$ta->tag_id] = $ta;
        }
        foreach($proper as $p){
            $properties[$p->id] = $p;
        }
        return ['locations' => $locations_name, 'operations' => $operations, 'total_surfaces' => $total_surfaces,
        'tags' => $tags_name, 'parking' => $parking, 'properties' => $properties,
            'room_amount' => $room_amount, 'suite_amount' => $suite_amount, 'age' => $age];
    }

    public function getSurfaces($surfaces)
    {
        try{
            $surf = explode(',', $surfaces);
            $menor = ['num' => 0, 'logic' => '>'];
            $mayor = ['num' => 0, 'logic' => '>'];
            foreach($surf as $s){
                if(substr($s, -1) == ':'){
                    if($menor['num']==0 || substr($s, 0, strlen($s)-1)<$menor['num']){
                        $menor['num'] = substr($s, 0, strlen($s)-1);
                        $menor['logic'] = '>';
                    }
                    if(substr($s, 0, strlen($s)-1)>$mayor['num']){
                        $mayor['num'] = substr($s, 0, strlen($s)-1);
                        $mayor['logic'] = '>';
                    }
                } else if(substr($s, 0, 1) == ':'){
                    if($menor['num']==0 || substr($s, 1)<$menor['num']){
                        $menor['num'] = substr($s, 1);
                        $menor['logic'] = '<';
                    }
                    if(substr($s, 1)>$mayor['num']){
                        $mayor['num'] = substr($s, 1);
                        $mayor['logic'] = '<';
                    }
                } else {
                    $da = explode(':', $s);
                    if($menor['num']==0 || $da[0]<$menor['num']){
                        $menor['num'] = $da[0];
                        $menor['logic'] = '>';
                    }
                    if($da[1]>$mayor['num']){
                        $mayor['num'] = $da[1];
                        $mayor['logic'] = '<';
                    }
                }
            }
            if($mayor['num']<=$menor['num']){
                $filters = '["total_surface","'.$menor['logic'].'",'.$menor['num'].']';
                if($menor['logic']=='<'){
                    $details = ':'.$menor['num'];
                } else {
                    $details = $menor['num'].':';
                }
            } else {
                if($mayor['logic']=='<'){
                    $filters = '["total_surface",">",'.$menor['num'].'],["total_surface","<",'.$mayor['num'].']';
                    $details = $menor['num'].':'.$mayor['num'];
                } else {
                    $filters = '["total_surface",">",'.$menor['num'].']';
                    $details = $menor['num'].':';
                }
            }
            return ['details' => $details, 'filter' => $filters];
        } catch(\Exception $e){
            return false;
        }

    }
}
