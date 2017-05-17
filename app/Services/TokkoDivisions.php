<?php

namespace App\Services;

class TokkoDivisions
{
   
   var $BASE_URL_STATE = "http://tokkobroker.com/api/v1/state/";
   var $BASE_URL_DIVISION = "http://tokkobroker.com/api/v1/location/";
   var $AJAX_URL_STATE = "http://tokkobroker.com/api/v1/location/?format=jsonp&lang=es_ar&limit=100&state=";
   var $AJAX_URL_DIVISION = "http://tokkobroker.com/api/v1/location/?format=jsonp&lang=es_ar&limit=100&parent_division=";
   var $divisions = null;
   var $select_box_id = '';
   var $select_box_head_choice = '';
   var $parent=null;
   var $child = null;
   var $state_id = null;
   var $division_id = null;
   var $grandparent_id = null;
   var $parent_type = null;
   var $name = null;
   
   function load_divisions(){
       try {
           $data = json_decode(file_get_contents(($this->state_id ? $this->BASE_URL_STATE . $this->state_id : $this->BASE_URL_DIVISION . $this->division_id) ."/"));
           $this->divisions = $data->divisions;
           $this->name = $data->name;
           if ($this->state_id){
               $urlsplitted = split("/", $data->country);
           }else{
               if ($data->state){
                   $urlsplitted = split("/", $data->state);
               }else{
                   $parent_type = "division";
                   $urlsplitted = split("/", $data->parent_division);
               }
           }
           $this->grandparent_id = $urlsplitted[count($urlsplitted)-2];
       }catch (Exception $e) {
           $this->divisions = null;
       }
   }

   function __construct($state_id=null, $division_id=null){
       if ($state_id){
           $this->state_id = $state_id;
           $this->load_divisions();
       }
       if ($division_id){
           $this->divisions_id = $divisions_id;
           $this->load_divisions();
       }
   }

   function deploy_select_box($id, $name, $classes, $default=null, $head_choice=''){
       $this->select_box_id = $id;
       $this->select_box_head_choice = $head_choice;
       echo '<SELECT id="'.$id.'" name="'.$name.'" class="'.$classes.'" >';
       echo "<OPTION value='0'>". $head_choice ."</OPTION>";
       if ($this->divisions){
           foreach ( $this->divisions as $division){
               $selected = "";
               if ( $default == $division->id){
                   $selected = "selected";
               }
               echo "<OPTION value='". $division->id ."' ". $selected .">". $division->name  ."</OPTION>";
           }
       }
       echo '</SELECT>';
   }

   function connect($parent){
       $this->parent = &$parent;
       $this->parent->child = &$this;
       if ($this->grandparent_id){
           if ($this->state_id){
               $this->parent->country_id = $this->grandparent_id;
           }else{
               if ($this->parent_type == 'division'){
                   $this->parent->division_id = $this->grandparent_id;
               }else{
                   $this->parent->state_id = $this->grandparent_id;
               }
           }
       }
   }

   function ajax_deploy($hide_childs=false, $input_id_for_type=null, $input_id_for_id=null ){
       if ($this->parent->select_box_id){
           echo '<script>';
           echo '$("#'. $this->parent->select_box_id .'").on("change", function(event) {';
           if ($input_id_for_id){
               echo '    if($("#'. $this->parent->select_box_id . '").val() == "0"){';
               if ($this->parent->parent){
               echo '        $("#'. $input_id_for_id . '").val($("#'. $this->parent->parent->select_box_id . '").val());';
               }else{
               echo '        $("#'. $input_id_for_id . '").val("0");';
               }
               echo '    }else{';
               echo '        $("#'. $input_id_for_id . '").val($("#'. $this->parent->select_box_id . '").val());';
               echo '    }';
           }
           if ($input_id_for_type){
               if ($this->parent->type){
                   echo '$("#'. $input_id_for_type . '").val("state");';
               }else{
                   echo '$("#'. $input_id_for_type . '").val("division");';
               }
           }
           echo '    var jqxhr = $.ajax({';
           echo '        url: "'. ($this->parent->type ? $this->AJAX_URL_STATE : $this->AJAX_URL_DIVISION) .'"+$("#'. $this->parent->select_box_id . '").val(),';
           echo '        dataType: "jsonp",';
           echo '        type: "GET",';
           echo '        success:function(json){';
           echo '            divisions = json.objects;';
           echo '            $("#'.$this->select_box_id.'").html("");';
           echo '            $("#'.$this->select_box_id.'").append("<option selected value=\'0\'>'.$this->select_box_head_choice.'</option>");';
           echo '            for (i in divisions){';
           echo '                $("#'.$this->select_box_id.'").append("<option value=\'" + divisions[i].id + "\'>"+ divisions[i].name+"</option>");';
           echo '            }';
           if ($hide_childs){
               echo '        if ($("#'. $this->parent->select_box_id . '").val() != "0" && divisions.length > 0){$("#'.$this->select_box_id.'").parent().show();}else{$("#'.$this->select_box_id.'").parent().hide();}';
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
           echo '   ';
           echo '     } );';
           echo "</script>";
       }else{
           echo "No state/division select box was deployed";
       }
   }

}
