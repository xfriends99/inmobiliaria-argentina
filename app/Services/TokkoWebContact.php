<?php

namespace App\Services;

class TokkoWebContact
{
   
   var $auth = null;
   var $BASE_SEND_URL = "http://tokkobroker.com/api/v1/webcontact/?key=";
   var $data = null;

   function __construct($auth = null, $data=array()){
       $this->auth = $auth;
       $this->data = $data;
   }

   function send(){
       $content = json_encode($this->data);
       $curl = curl_init($this->BASE_SEND_URL . $this->auth->key);
       curl_setopt($curl, CURLOPT_HEADER, false);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

       $json_response = curl_exec($curl);

       $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
       curl_close($curl);
       if ( $status != 201 ) {
         die($json_response);
       }

       return json_decode($json_response, true);
   }
   
}
