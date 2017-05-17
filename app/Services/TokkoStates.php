<?php

namespace App\Services;

class TokkoStates
{
   
   var $BASE_URL = "http://tokkobroker.com/api/v1/country/";
   var $AJAX_URL = "http://tokkobroker.com/api/v1/state/?format=jsonp&lang=es_ar&limit=100&country=";
   var $states = null;
   var $select_box_id = '';
   var $country_id = null;
   var $select_box_head_choice = '';
   var $parent = null;
   var $type="state";
   var $child = null;

   function load_states(){
       try {
           $this->states = json_decode(file_get_contents($this->BASE_URL . $this->country_id ."/"))->states;
       }catch (Exception $e) {
           $this->states = null;
       }
   }

   function __construct($country_id=null){
       if ($country_id){
           $this->country_id = $country_id;
           $this->load_states();
       }
   }


   function connect($parent){
       $this->parent = &$parent;
       $this->parent->child = &$this;
   }

   function ajax_deploy($hide_childs=false, $input_id_for_type=null, $input_id_for_id=null){
       if ($this->parent->select_box_id){
           echo '<script>';
           echo '$("#'. $this->parent->select_box_id  .'").on("change", function(event) {';
           if ($input_id_for_id){
               echo '$("#'. $input_id_for_id . '").val($("#'. $this->parent->select_box_id . '").val());';
           }
           if ($input_id_for_type){
               echo '$("#'. $input_id_for_type . '").val("country");';
           }
           echo '    var jqxhr = $.ajax({';
           echo '        url: "'. $this->AJAX_URL .'"+$("#'. $this->parent->select_box_id . '").val(),';
           echo '        dataType: "jsonp",';
           echo '        type: "GET",';
           echo '        success:function(json){';
           echo '            states = json.objects;';
           echo '            $("#'.$this->select_box_id.'").html("");';
           echo '            $("#'.$this->select_box_id.'").append("<option selected value=\'0\'>'.$this->select_box_head_choice.'</option>");';
           echo '            for (i in states){';
           echo '                $("#'.$this->select_box_id.'").append("<option value=\'" + states[i].id + "\'>"+ states[i].name+"</option>");';
           echo '            }';
           if ($hide_childs){
               echo '        if ($("#'. $this->parent->select_box_id . '").val() != "0" && states.length > 0){$("#'.$this->select_box_id.'").parent().show();}else{$("#'.$this->select_box_id.'").parent().hide();}';
               $child = $this->child;
               while ($child){
                  echo '     $("#'.$child->select_box_id.'").parent().hide();';
                  $child = $child->child;
               }
           }
           echo '        }})';
           echo '        .fail(function(){';
           if ($hide_childs){
               $child = $this->child;
               while ($child){
                  echo '     $("#'.$child->select_box_id.'").parent().hide();';
                  $child = $child->child;
               }
           }
           echo '        })';
           echo '     } );';
           echo "</script>";
       }else{
           echo "No countries select box was deployed";
       }
   }

}
