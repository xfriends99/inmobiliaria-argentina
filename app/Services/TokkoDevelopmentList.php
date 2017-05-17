<?php

namespace App\Services;

class TokkoDevelopmentList
{
  
  var $data = null;
  var $summary= null;
  var $auth;
  var $querystring_page_key = "page";
  var $default_page_limit = 20;
  var $querystring_page_limit_key = "limit";
  var $BASE_URL = "http://www.tokkobroker.com/api/v1/development/";
  var $SUMMARY_URL = "http://www.tokkobroker.com/api/v1/development/summary/";

  function __construct($auth=null, $status=null, $type=null, $custom_tags=null){
      try {
          if ($status){
              $url = $this->BASE_URL . "?format=json&construction_status=". $status ."&key=". $auth->key ."&lang=".$auth->get_language();

          }elseif($type){
              $url = $this->BASE_URL . "?format=json&type=". $type ."&key=". $auth->key ."&lang=".$auth->get_language();
          }else{
              $url = $this->BASE_URL . "?format=json&key=". $auth->key ."&lang=".$auth->get_language();
          }

          if($custom_tags){
            $url = $url."&custom_tags=".$custom_tags;
          }

          $url = $url."&limit=".$this->get_current_page_limit()."&offset=".$this->get_offset();

          $cp = curl_init();
          curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($cp, CURLOPT_URL, $url);
          curl_setopt($cp, CURLOPT_TIMEOUT, 60);
          $this->data = json_decode(curl_exec($cp));
          curl_close($cp);
          $this->auth = $auth;
      } catch (Exception $e) {
              $this->data = null;
       }
  }

  function get_result_count(){
      if ($this->data == null){
          return 0;
      }else{
          return $this->data->meta->total_count;
      }
  }


  function get_developments(){
        $developments = array();
        if ($this->data == null){
            return $developments;
        }else{
            foreach ($this->data->objects as $devel) {
                array_push($developments, new TokkoDevelopment('object', $devel));
            }
            return $developments;
        }
  }

    function get_result_page_count(){
        if ($this->data == null){
            return 0;
        }else{
            return ceil($this->data->meta->total_count/$this->data->meta->limit);
        }
    }

  function get_current_page_limit(){
      if ($_REQUEST[$this->querystring_page_limit_key]){
          return intval($_REQUEST[$this->querystring_page_limit_key]);
      }else{
          return $this->default_page_limit;
      }
  }

  function get_offset(){
    return ($this->get_current_page()-1) * $this->get_current_page_limit();
  }

  function get_current_page(){
      if ($_REQUEST[$this->querystring_page_key]){
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
      $url_for_page = strtok($_SERVER["REQUEST_URI"],'?')."?page=".$page."&limit=".$this->get_current_page_limit();

      if($_REQUEST['type']){
        $url_for_page = $url_for_page."&type=".$_REQUEST['type'];
      }

      if($_REQUEST['custom_tags']){
        $url_for_page = $url_for_page ."&custom_tags=".$_REQUEST['custom_tags'];
      }
      return $url_for_page;
  }

  function deploy_google_map($api_google='AIzaSyCTyr98mlkJl0GLTVc8WmBI5X0UZJshOm4', $container_id='map',$icon_url=null, $classes="", $must_deploy_js=true, $must_deploy_container=true, $infowindow_url=null, $infoowindow_method='click', $locations=null){

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
      echo 'center: new google.maps.LatLng(-34.610, -58.44),';
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
        echo 'new google.maps.Size(21, 34),';
        echo 'new google.maps.Point(0,0),';
        echo 'new google.maps.Point(10, 34));';
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
          echo 'content:"<div style=\'width:130px; height:25px; text-align:center\' id=\'development_tooltip_"+id+"\' class=\'infowindow-main-div\'><span>Cargando...</span></div>"';
          echo '});';
          echo 'var jqxhr = $.ajax("'.$infowindow_url.'?id="+id)';
            echo '.done(function(result) {';
            echo '$("#development_tooltip_"+id).html(result);';
            echo 'markers[id]["info"] = new google.maps.InfoWindow({';
              echo 'content:"<div id=\'development_tooltip_"+id+"\' class=\'infowindow-main-div\'>"+result+"</div>"';
            echo '});';
          echo '});';
    
          echo 'markers[id]["info"] = infoWindow;';
          echo '}';
          echo 'markers[id].info.open(map,markers[id].marker);';
          echo 'open_window = markers[id].info;';
        echo '});';
      }
    echo '}';

    foreach($locations as $location){
      if($location["lat"] && $location["long"]){
        echo 'add_new_marker("'.$location["id"].'", "'.$location["lat"].'", "'.$location["long"].'");';
      }
    }
    echo '</script>';
  }

  function fill_summary(){
    $url = $this->SUMMARY_URL . "?format=json&key=". $this->auth->key ."&lang=".$this->auth->get_language();

    $cp = curl_init();
    curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($cp, CURLOPT_URL, $url);
    curl_setopt($cp, CURLOPT_TIMEOUT, 60);
    $this->summary = json_decode(curl_exec($cp));
    curl_close($cp);
  }
  
}
