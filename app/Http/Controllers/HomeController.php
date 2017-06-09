<?php

namespace App\Http\Controllers;

use App\Services\TokkoAuth;
use App\Services\TokkoProperty;
use App\Services\TokkoPropertyTypes;
use App\Services\TokkoSearch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $example_data = '{"current_localization_id":0,"current_localization_type":"country","price_from":"","price_to":"","operation_types":[1,2,3],
        "property_types":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25],"currency":"ANY","filters":[],"with_tags":[1528]}';
        $auth = new TokkoAuth(env('API_KEY'));
        $tokko_search = new TokkoSearch($auth, $example_data);
        $tokko_search->do_search(null, 'id', 'DESC');
        $properties = $tokko_search->get_properties();
        //$tokko_properties = new TokkoPropertyTypes($auth);
        //$tokko_properties = $tokko_properties->property_types;
        $properties = array_slice($properties, 0, 6);
        return view('frontend.homepage', compact('properties', 'tokko_search'));
    }

    public function inmobiliarias()
    {
        return view('frontend.inmobiliarias');
    }

    public function nosotros()
    {
        return view('frontend.nosotros');
    }

    public function thankyou()
    {
        return view('frontend.thankyou');
    }
}
