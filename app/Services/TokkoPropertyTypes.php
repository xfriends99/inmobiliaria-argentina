<?php

namespace App\Services;

class TokkoPropertyTypes
{
   
   var $BASE_URL = "http://tokkobroker.com/api/v1/property_type/";
   var $auth = null;
   var $property_types = array();
   
   function __construct($auth, $filter=null){
       try {
           $this->auth = $auth;
           $data = json_decode(file_get_contents($this->BASE_URL . "?lang=". $this->auth->get_language() . "&key=". $this->auth->key))->objects;
           
           if ($filter){
               foreach ($data as $property_type){
                   if (in_array($property_type->id, $filter)){
                       array_push($this->property_types, $property_type);
                   }
               }
           }else{
               $this->property_types = $data;
           }
       }catch (Exception $e) {
           $this->property_types = null;
       }
   }

}
