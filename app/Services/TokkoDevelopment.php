<?php

namespace App\Services;

class TokkoDevelopment
{
   
   var $data = null;
   var $BASE_URL = "http://www.tokkobroker.com/api/v1/development/";
   function __construct($get_type, $data, $auth=null){
       if ($get_type == 'object'){
           $this->data = $data;
       }
       try {
           if ($get_type == 'id'){
               $url = $this->BASE_URL . $data . "/?format=json&key=". $auth->key ."&lang=".$auth->get_language();

               $cp = curl_init();
               curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
               curl_setopt($cp, CURLOPT_URL, $url);
               curl_setopt($cp, CURLOPT_TIMEOUT, 60);
               $this->data = json_decode(curl_exec($cp));
               curl_close($cp);
           }
        } catch (Exception $e) {
               $this->data = null;
        }
   }

   function get_field($field){
       if ($this->data == null){
           return "No development";
       }else{
           try{
               return $this->data->$field;
           }catch (Exception $e) {
               echo "Invalid field";
           }
       }
   }

   function get_cover_picture(){
       $cover_picture = null;
       if ($this->data == null){
           echo "No development";
       }else{
           foreach ( $this->data->photos as $photo){
               if ($photo->is_front_cover){
                   $cover_picture = $photo;
               }
           }
       }
       return $cover_picture;
   }

   function get_tags_by_type($type){
       $tag_list = array();
       foreach ( $this->data->tags as $tag){
           if ($tag->type == $type){
               array_push($tag_list, $tag);
           }
       }
       return $tag_list;
   }
   
}
