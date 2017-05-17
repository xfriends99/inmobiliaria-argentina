<?php

namespace App\Services;

class TokkoTags{
    
   var $BASE_URL = "http://tokkobroker.com/api/v1/property_tag/";
   var $auth = null;
   var $property_tags = array();
   
   function __construct($auth, $filter=null){
       try {
           $this->auth = $auth;
           $data = json_decode(file_get_contents($this->BASE_URL . "?lang=". $this->auth->get_language() . "&key=". $this->auth->key))->objects;
           
           if ($filter){
               foreach ($data as $property_tag){
                   if (in_array($property_tag->id, $filter)){
                       array_push($this->property_tags, $property_tag);
                   }
               }
           }else{
               $this->property_tags = $data;
           }
       }catch (Exception $e) {
           $this->property_tags = null;
       }
   }
}
