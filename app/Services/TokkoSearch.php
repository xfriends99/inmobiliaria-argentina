<?php

namespace App\Services;

class TokkoSearch
{

    var $BASE_SEARCH_URL = 'http://tokkobroker.com/api/v1/property/search/?';
    var $BASE_GEO_URL = 'http://tokkobroker.com/api/v1/property/geo_data/?';
    var $BASE_BY_LOCATION_URL = 'http://tokkobroker.com/api/v1/property/by_location/?';
    var $BASE_SEARCH_SUMMARY = 'http://tokkobroker.com/api/v1/property/get_search_summary/?';
    var $auth = null;
    var $querystring_data_key = "data";
    var $querystring_page_key = "page";
    var $querystring_page_limit_key = "limit";
    var $default_page_limit = 20;

    var $querystring_order_key = "order";
    var $default_search_order = "desc";
    var $current_search_order = "desc";

    var $querystring_order_by_key = "order_by";
    var $default_search_order_by = "price";
    var $current_search_order_by = "price";

    var $results_format = "json";

    var $search_data = null;
    var $geo_data = null;
    var $search_results = null;
    var $properties_by_location = null;
    var $summary = null;

    function get_geo_data(){
        if ($this->search_data == null){
            echo "No search parameters were given";
        }else{
            try {
                if ($this->geo_data){
                    return $this->geo_data->objects;
                }
                $this->geo_data = json_decode(file_get_contents($this->BASE_GEO_URL . "format=". $this->results_format ."&key=". $this->auth->key ."&lang=". $this->auth->get_language() ."&data=" . json_encode($this->search_data)));
                return $this->geo_data->objects;
            } catch (Exception $e) {
                $this->geo_data = null;
                echo "Error executing query.";
            }
        }
    }

    function get_properties_by_location(){
        if ($this->search_data == null){
            echo "No search parameters were given";
        }else{
            try {
                if ($this->properties_by_location){
                    return $this->properties_by_location->objects;
                }
                $url = $this->BASE_BY_LOCATION_URL . "format=". $this->results_format ."&key=". $this->auth->key ."&lang=". $this->auth->get_language() ."&data=" . json_encode($this->search_data);
                $cp = curl_init();
                curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($cp, CURLOPT_URL, $url);
                curl_setopt($cp, CURLOPT_TIMEOUT, 60);
                $this->properties_by_location = json_decode(curl_exec($cp));
                curl_close($cp);

                return $this->properties_by_location->objects;
            } catch (Exception $e) {
                $this->properties_by_location = null;
                echo "Error executing query.";
            }

        }
    }

    function get_total_properties_by_location(){
        if ($this->properties_by_location == null){
            return 0;
        }else{
            return $this->properties_by_location->meta->total_count;
        }
    }

    function get_operation_name($id){
        if ($this->auth->get_language() == 'en'){
            switch ($id) {
                case 1:
                    return "Sale";
                case 2:
                    return "Rent";
                case 3:
                    return "Temporary Rent";
            }
        }else{
            switch ($id) {
                case 1:
                    return "Venta";
                case 2:
                    return "Alquiler";
                case 3:
                    return "Alquiler Temporario";
            }
        }
    }

    function get_current_page(){

        if (isset($_REQUEST[$this->querystring_page_key])){
            return intval($_REQUEST[$this->querystring_page_key]);
        }else{
            return 1;
        }
    }

    function get_previous_page_or_null(){
        return $this->get_current_page() > 1 ? $this->get_current_page()-1 : null;
    }

    function get_next_page_or_null(){
        return $this->get_current_page() < $this->get_result_page_count() ? $this->get_current_page()+1 : null;
    }

    function get_url_for_page($page){
        return strtok($_SERVER["REQUEST_URI"],'?') ."?order_by=".$this->get_search_order_by()."&order=".$this->get_search_order()."&page=".$page."&limit=".$this->get_current_page_limit()."&data=".json_encode($this->search_data)."';";
    }

    function get_current_page_limit(){
        if (isset($_REQUEST[$this->querystring_page_limit_key])){
            return intval($_REQUEST[$this->querystring_page_limit_key]);
        }else{
            return $this->default_page_limit;
        }
    }

    function get_search_offset(){
        return ($this->get_current_page()-1) * $this->get_current_page_limit();
    }


    function decode_search_data($search_data){
        return json_decode($bodytag = str_replace("\\", "", $search_data), true);
    }

    function set_search_data($search_data){
        if (gettype($search_data) == 'string'){
            try{
                $this->search_data = $this->decode_search_data($search_data);
            } catch (Exception $e) {
                $this->search_data = null;
            }
        }else{
            $this->search_data = $search_data;
        }
    }

    function get_search_order_by(){
        if (isset($_REQUEST[$this->querystring_order_by_key])){
            $this->current_search_order_by = $_REQUEST[$this->querystring_order_by_key];
        }else{
            $this->current_search_order_by = $this->default_search_order_by;
        }
        return $this->current_search_order_by;
    }

    function get_search_operations(){
        $ops = array();
        foreach ($this->search_data['operation_types'] as $operation_type){
            array_push($ops, $this->get_operation_name($operation_type));
        }
        return $ops;
    }

    function get_search_order(){
        if (isset($_REQUEST[$this->querystring_order_key])){
            $this->current_search_order = $_REQUEST[$this->querystring_order_key];
        }else{
            $this->current_search_order = $this->default_search_order;
        }
        return $this->current_search_order;
    }

    function __construct($auth, $search_data=null) {
        $this->auth = $auth;
        if ($search_data == null){
            if(isset($_REQUEST[$this->querystring_data_key])){
                try{
                    $this->search_data = $this->decode_search_data($_REQUEST[$this->querystring_data_key]);
                } catch (Exception $e) {
                    $this->search_data = null;
                }
            } else {
                $this->search_data = null;
            }
        }else{
            $this->set_search_data($search_data);
        }
    }

    function do_search($limit=null, $order_by=null, $order=null){
        if ($this->search_data == null){
            echo "No search parameters were given";
        }else{
            try {
                if (!$limit){ $limit = $this->get_current_page_limit();}
                if (!$order_by){ $order_by = $this->get_search_order_by();}
                if (!$order){ $order = $this->get_search_order();}

                $url = $this->BASE_SEARCH_URL . "order_by=" . $order_by ."&order=". $order ."&format=". $this->results_format ."&key=". $this->auth->key ."&lang=". $this->auth->get_language() ."&limit=". $limit ."&offset=" . $this->get_search_offset() . "&data=" . json_encode($this->search_data);
                $cp = curl_init();
                curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($cp, CURLOPT_URL, $url);
                curl_setopt($cp, CURLOPT_TIMEOUT, 60);
                $this->search_results = json_decode(curl_exec($cp));
                curl_close($cp);
            } catch (Exception $e) {
                $this->search_results = null;
                echo "Error executing query.";
            }
        }
    }

    function get_summary(){
        if ($this->search_data == null){
            echo "No search parameters were given";
        }else{
            try {
                $url = $this->BASE_SEARCH_SUMMARY . "&format=". $this->results_format ."&key=". $this->auth->key ."&lang=". $this->auth->get_language() . "&offset=" . $this->get_search_offset() . "&data=" . json_encode($this->search_data);
                $cp = curl_init();
                curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($cp, CURLOPT_URL, $url);
                curl_setopt($cp, CURLOPT_TIMEOUT, 60);
                $this->summary = json_decode(curl_exec($cp));
                curl_close($cp);
            } catch (Exception $e) {
                $this->summary = null;
                echo "Error executing query.";
            }
        }
    }

    function get_summary_field($field){
        if ($this->summary == null){
            $this->get_summary();
        }
        try{
            if(isset($this->summary->objects->$field)){
                return $this->summary->objects->$field;
            } else {
                return [];
            }
        }catch (Exception $e) {
            echo "Invalid field";
        }
    }

    function get_summary_tags_by_type($type){
        if ($this->summary == null){
            $this->get_summary();
        }

        $tag_list = array();
        foreach ( $this->summary->objects->tags as $tag){
            if ($tag->tag_type == $type){
                array_push($tag_list, $tag);
            }
        }
        return $tag_list;
    }

    function get_summary_total_surface(){
        if ($this->summary == null){
            $this->get_summary();
        }

        $total_surfaces = array();
        if(isset($this->summary->objects->total_surface)) {
            foreach ($this->summary->objects->total_surface as $total_surface) {
                $array = array();
                $array["count"] = $total_surface->count;
                $range = explode(":", $total_surface->range);
                $text = array();
                if ($range[0]) {
                    array_push($text, "Desde " . $range[0] . " m2");
                }

                if ($range[1]) {
                    array_push($text, "Hasta " . $range[1] . " m2");
                }

                $array["range"] = implode(" ", $text);
                $array["value"] = $total_surface->range;
                array_push($total_surfaces, $array);
            }
        }
        return $total_surfaces;
    }

    function do_search_page($page, $limit=null, $order_by=null, $order=null){
        try {
            if (!$limit){ $limit = $this->get_current_page_limit();}
            if (!$order_by){ $order_by = $this->get_search_order_by();}
            if (!$order){ $order = $this->get_search_order();}

            $url = $this->BASE_SEARCH_URL . "order_by=" . $order_by ."&order=". $order ."&format=". $this->results_format ."&key=". $this->auth->key ."&lang=". $this->auth->get_language() ."&limit=". $limit ."&offset=" . ($limit * $page) . "&data=" . json_encode($this->search_data);
            $cp = curl_init();
            curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($cp, CURLOPT_URL, $url);
            curl_setopt($cp, CURLOPT_TIMEOUT, 60);
            $this->search_results = json_decode(curl_exec($cp));
            curl_close($cp);
        } catch (Exception $e) {
            $this->search_results = null;
            echo "Error executing query.";
        }
    }

    function do_search_all($limit, $order_by=null, $order=null){
        try {
            if (!$order_by){ $order_by = $this->get_search_order_by();}
            if (!$order){ $order = $this->get_search_order();}

            $url = $this->BASE_SEARCH_URL . "order_by=" . $order_by ."&order=". $order ."&format=". $this->results_format ."&key=". $this->auth->key ."&lang=". $this->auth->get_language() ."&limit=". $limit . "&data=" . json_encode($this->search_data);
            $cp = curl_init();
            curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($cp, CURLOPT_URL, $url);
            curl_setopt($cp, CURLOPT_TIMEOUT, 60);
            $this->search_results = json_decode(curl_exec($cp));
            curl_close($cp);
        } catch (Exception $e) {
            $this->search_results = null;
            echo "Error executing query.";
        }
    }

    function get_result_page_count(){
        if ($this->search_results == null){
            return 0;
        }else{
            return ceil($this->search_results->meta->total_count/$this->search_results->meta->limit);
        }
    }

    function get_result_count(){
        if ($this->search_results == null){
            return 0;
        }else{
            return $this->search_results->meta->total_count;
        }
    }

    function get_properties(){
        $properties = array();
        if ($this->search_results == null){
            return $properties;
        }else{
            foreach ($this->search_results->objects as $prop) {
                array_push($properties, new TokkoProperty('object', $prop));
            }
            return $properties;
        }
    }

    function deploy_google_map($api_google='AIzaSyCTyr98mlkJl0GLTVc8WmBI5X0UZJshOm4', $container_id='map',$icon_url=null, $classes="", $must_deploy_js=true, $must_deploy_container=true, $infowindow_url=null, $infoowindow_method='click'){

        if($must_deploy_js){
            echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key='.$api_google.'&sensor=false"></script>';
        }

        if($must_deploy_container){
            echo '<div id="'.$container_id.'"';
            if($classes != "" && $classes != null){
                echo 'class="'.$classes.'"';
            }
            echo ' ></div>';
        }

        echo '<script>';
        echo 'var mapOptions = {';
        echo 'center: new google.maps.LatLng(-34.380, -58.71),';
        echo 'zoom: 12';
        echo '};';

        echo 'var map = new google.maps.Map(document.getElementById("'.$container_id.'"), mapOptions);';

        echo 'var markers = {};';
        echo 'var open_window = null;';
        echo 'var current_id = null;';

        echo 'var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",';
        echo 'new google.maps.Size(40, 37),';
        echo 'new google.maps.Point(0, 0),';
        echo 'new google.maps.Point(12, 35));';

        if($icon_url){
            echo 'var pinImage_red = new google.maps.MarkerImage("'.$icon_url.'",';
            echo 'new google.maps.Size(40, 37),';
            echo 'new google.maps.Point(0,0),';
            echo 'new google.maps.Point(12, 35));';
        }

        echo 'function add_new_marker(id, lat,lng){';
        echo 'var latLng = new google.maps.LatLng(lat, lng);';
        echo 'marker = new google.maps.Marker({';
        echo 'position: latLng,';
        echo 'animation: google.maps.Animation.DROP,';
        echo 'shadow: pinShadow,';
        if($icon_url){
            echo 'icon: pinImage_red,';
        }
        echo 'map: map,';
        echo 'draggable: false,';
        echo 'visible: true';
        echo '});';

        echo 'markers[id] = {"marker": marker, "info": null};';

        if($infowindow_url){
            echo 'google.maps.event.addListener(markers[id].marker, "'.$infoowindow_method.'", function() {';
            echo 'if (open_window) { open_window.close();}';
            echo 'if (!markers[id].info) {';
            echo 'infoWindow = new google.maps.InfoWindow({';
            echo 'content:"<div style=\'width:220px;height:90px; text-align:center\' id=\'prop_tooltip_"+id+"\' class=\'infowindow-main-div\'><span>Cargando...</span></div>"';
            echo '});';
            echo 'var jqxhr = $.ajax("'.$infowindow_url.'?id="+id)';
            echo '.done(function(result) {';
            echo '$("#prop_tooltip_"+id).html(result);';
            echo 'markers[id]["info"] = new google.maps.InfoWindow({';
            echo 'content:"<div id=\'prop_tooltip_"+id+"\' class=\'infowindow-main-div\'>"+result+"</div>"';
            echo '});';
            echo '});';

            echo 'markers[id]["info"] = infoWindow;';
            echo '}';
            echo 'markers[id].info.open(map,markers[id].marker);';
            echo 'open_window = markers[id].info;';
            echo '});';
        }
        echo '}';

        foreach($this->get_geo_data() as $geo){
            if($geo->geo_lat && $geo->geo_long){
                echo 'add_new_marker("'.$geo->id.'", "'.$geo->geo_lat.'", "'.$geo->geo_long.'");';
            }
        }

        echo '</script>';
    }

}