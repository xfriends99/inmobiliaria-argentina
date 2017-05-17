<?php

namespace App\Services;

class TokkoAuth
{
    var $key=null;
    var $querystring_lang_key = "lang";
    var $default_lang = "es_ar";
    var $current_lang = "es_ar";

    function __construct($key, $lang="es_ar"){
        $this->key = $key;
        $this->default_lang = $lang;
    }

    function get_language(){
        if(isset($_REQUEST[$this->querystring_lang_key])){
            $lang = $_REQUEST[$this->querystring_lang_key];
        }else{
            $lang = null;
        }
        if ($lang){
            $this->current_lang = $lang;
        }else{
            $this->current_lang = $this->default_lang;
        }
        return $this->current_lang;
    }
}
