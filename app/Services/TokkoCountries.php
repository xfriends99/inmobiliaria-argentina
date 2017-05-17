<?php

namespace App\Services;

class TokkoCountries
{
   var $BASE_URL = "http://tokkobroker.com/api/v1/countries/";
   var $countries = null;
   var $select_box_id = '';
   var $child = null;
   var $type='country';
   
   function __construct(){

       try {
           $this->countries = json_decode(file_get_contents($this->BASE_URL))->objects;
       }catch (Exception $e) {
           $this->countries = null;
       }

   }
}
