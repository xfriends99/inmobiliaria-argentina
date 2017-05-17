<?php

namespace App\Services;

class TokkoSearchForm
{
   
   var $auth = null;
   var $selectors=array();
   var $filters = array();

   function __construct($auth = null){
       $this->auth = $auth;
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

   function deploy_price_range_selection($id, $selection_text=array('', ''), $ranges=array(30000,50000,100000,150000,200000,250000,300000,350000,400000,450000,500000,1000000,2000000,3000000,4000000,5000000), $classes="", $default=null){
       $this->selectors['price_range'] = array('min'=>array(), 'max'=>array());
       $this->selectors['price_range']['min']['id'] = $id.'-min';
       $this->selectors['price_range']['max']['id'] = $id.'-max';
       echo '<SELECT id="'.$id.'-min" name="'.$id.'-min" class="'.$classes.'">';
       echo "<OPTION value='0'>". $selection_text[0]."</OPTION>";
       foreach ($ranges as $price){
           $selected = "";
           if ( $default[0] == $price){
               $selected = "selected";
           }
           echo "<OPTION value='". $price ."' ". $selected .">". number_format($price,0,',','.') ."</OPTION>";
       }
       echo '</SELECT>&nbsp;&nbsp;';
       echo '<SELECT id="'.$id.'-max" name="'.$id.'-max" class="'.$classes.'">';
       echo "<OPTION value='999999999'>". $selection_text[1]."</OPTION>";
       foreach ($ranges as $price){
           $selected = "";
           if ( $default[1] == $price){
               $selected = "selected";
           }
           echo "<OPTION value='". $price ."' ". $selected .">". number_format($price,0,',','.') ."</OPTION>";
       }
       echo '</SELECT>';

   }

   function deploy_range_filter_selection($id, $field, $selection_text=array('', ''), $ranges=array(1,2,3,4,5,6,7,8,9,10), $classes="", $default=null, $include_bounds=true){
       $this->filters[$field] = array('>'=>array(), '<'=>array());
       $this->filters[$field]['>']['id'] = $id.'-min';
       $this->filters[$field]['<']['id'] = $id.'-max';

       $modifier = $include_bounds ? 1: 0;
       echo '<SELECT id="'.$id.'-min" name="'.$id.'-min" class="'.$classes.'">';
       echo "<OPTION value='0'>". $selection_text[0]."</OPTION>";
       foreach ($ranges as $range){
           $selected = "";
           if ( $default[0] == $range){
               $selected = "selected";
           }
           echo "<OPTION value='". ($range-$modifier) ."' ". $selected .">". $range ."</OPTION>";
       }
       echo '</SELECT>&nbsp;&nbsp;';
       echo '<SELECT id="'.$id.'-max" name="'.$id.'-max" class="'.$classes.'">';
       echo "<OPTION value='99999999'>". $selection_text[1]."</OPTION>";
       foreach ($ranges as $range){
           $selected = "";
           if ( $default[1] == $range){
               $selected = "selected";
           }
           echo "<OPTION value='". ($range+$modifier) ."' ". $selected .">". $range ."</OPTION>";
       }
       echo '</SELECT>';

   }

   function deploy_currency_selection($id, $selection_text='', $availables=array("USD", "ARS"), $classes="", $default=null, $type="select", $container=null){
       $this->selectors['currency'] = array();
       $this->selectors['currency']['id'] = $id;
       $this->selectors['currency']['type'] = $type;
       switch ($type) {
       case "select":
           if ($container){echo "<".$container.">";}
           echo '<SELECT id="'.$id.'" name="'.$id.'" class="'.$classes.'">';
           echo "<OPTION value='0'>". $selection_text."</OPTION>";
           foreach ($availables as $currency){
               $selected = "";
               if ( $default == $currency){
                   $selected = "selected";
               }
               echo "<OPTION value='". $currency ."' ". $selected .">". $currency ."</OPTION>";
           }
           echo '</SELECT>';
           if ($container){echo "</".$container.">";}
           break;
       case "radiobutton":
           echo $selection_text;
           foreach ($availables as $currency){
               $selected = "";
               if ( $default == $currency){
                   $selected = "checked";
               }
               if ($container){echo "<".$container.">";}
               echo '<input type="radio" name="'.$id.'" value="'.$currency.'" '.$selected.'> ' .$currency . '&nbsp;&nbsp;';
               if ($container){echo "</".$container.">";}
           }
           break;
       }
   }

   function deploy_operation_types_selection($id, $selection_text='', $availables=array(1,2,3), $classes="", $default=null, $type="select"){
       $this->selectors['operations'] = array();
       $this->selectors['operations']['id'] = $id;
       $this->selectors['operations']['type'] = $type;
       switch ($type) {
       case "select":
           echo '<SELECT id="'.$id.'" name="'.$id.'" class="'.$classes.'">';
           echo "<OPTION value='0'>". $selection_text."</OPTION>";
           foreach ($availables as $operation){
               $selected = "";
               if ( $default == $operation){
                   $selected = "selected";
               }
               echo "<OPTION value='". $operation ."' ". $selected .">". $this->get_operation_name($operation) ."</OPTION>";
           }
           echo '</SELECT>';
           break;
       case "radiobutton":
           echo $selection_text;
           foreach ($availables as $operation){
               $selected = "";
               if ( $default == $operation){
                   $selected = "checked";
               }
               echo '<input type="radio" name="'.$id.'" value="'.$operation.'" '.$selected.'> ' .$this->get_operation_name($operation) . '&nbsp;&nbsp;';
           }
           break;
       case "checkbox":
           echo $selection_text;
           foreach ($availables as $operation){
               $selected = "";
               if (in_array($operation, $default)){
                   $selected = "checked";
               }
               echo '<input type="checkbox" id="'.$id.'" name="'.$id.'" value="'.$operation.'" '.$selected.'> ' .$this->get_operation_name($operation) . '&nbsp;&nbsp;';
           }
           break;
       }
   }

   function deploy_location_tree($id, $default_select_text, $input_id_for_type=null, $input_id_for_id=null, $starting_id=null, $starting_box='country', $depth=10, $container_type='div', $hide_childs=true, $labels=null){
       $this->selectors['location'] = array();
       $this->selectors['location']['id'] = $input_id_for_id;
       $this->selectors['location']['type'] = $input_id_for_type;

       $selects = array();
       $next_box = $starting_box;
       $_starting_id = $starting_id;
       for ($i = 1; $i <= $depth; $i++) {
           if ($i > 1 && $_starting_id){
               $_starting_id = null;
           }
           $__starting_id = null;
           if ($i == 2 && $starting_id){
               $__starting_id = $starting_id;
           }
           if ($next_box == 'country'){
               $item =  new TokkoCountries();
               $next_box = 'state';
           }else{
               if ($next_box == 'state'){
                   $item =  new TokkoStates($__starting_id);
                   $next_box = 'division';
               }else{
                   $item =  new TokkoDivisions($__starting_id);
               }
           }
           array_push($selects, $item);
       }
       for ($i = $depth-1; $i > 0; $i--){
           $selects[$i]->connect($selects[$i-1]);
       }
       $_starting_id = $starting_id;
       for ($i = 0; $i < $depth; $i++) {
           if ($i > 0 && $_starting_id){
               $_starting_id = null;
           }
           $style="";
           if (($hide_childs && $i > 0 && !$starting_id) || ($hide_childs && $i > 1 && $starting_id)){
               $style="style='display:none'";
           }
           echo "<". $container_type ." ". $style .">";
           if($labels){
               try{
                   echo '<p>'. $labels[$i].'</p>';
               }catch (Exception $e) {
                   echo '<p>'. $labels[count($labels)-1].'</p>';
               }
           }
           if($_starting_id){$if_is_starting_id=$_starting_id;}
           $selects[$i]->deploy_select_box($id.'-'.$i, $id.'-'.$i, '', $if_is_starting_id, $default_select_text);
           echo "</". $container_type .">";
       }
       if ($input_id_for_type){
           echo "<input type='hidden' id='". $input_id_for_type ."' value='". $starting_box."'>";
       }
       if ($input_id_for_id){
           if ($starting_id){
               $val = "0";
           }
           echo "<input type='hidden' id='". $input_id_for_id ."' value=". $val.">";
       }
       for ($i = $depth-1; $i > 0; $i--){
           $selects[$i]->ajax_deploy($hide_childs, $input_id_for_type, $input_id_for_id);
       }
   }
   
   function deploy_property_types_selection($id, $selection_text='', $classes="", $default=null, $type="select"){
       $this->selectors['property_type'] = array();
       $this->selectors['property_type']['id'] = $id;
       $this->selectors['property_type']['type'] = $type;

       $property_types = new TokkoPropertyTypes($this->auth);
       $property_types->deploy_selection($id, $selection_text, $classes, $default, $type);
   }

   function deploy_search_button($id, $text, $classes=""){
       $this->selectors['search_button'] = array();
       $this->selectors['search_button']['id'] = $id;
       echo '<input type="button" id="'.$id.'" class="'.$classes.'" value="'.$text.'" />';
   }
   
   function deploy_search_function($url, $order_by="price", $order="desc", $override_selectors=null, $default_values_if_zero=array('location_id'=>0, 'location_type'=>'country', 'currency'=>'ARS', 'property_types'=>"[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]", 'price_from'=>'0', 'price_to'=>"999999999", "operations"=>"[1,2,3]"), $filter_gen_function=null, $limit=20){

       if ($override_selectors){
           foreach(array_keys($override_selectors) as $override_key){
               $this->selectors[$override_key] = $override_selectors[$override_key];
           }
       }

       try{
           $search_button_selector = $this->selectors['search_button']['id'];
       }catch (Exception $e) {
           echo "Missing search button selector";
           return null;
       }

       try{
           $location_id_selector = $this->selectors['location']['id'];
       }catch (Exception $e) {
           $location_id_selector = null;
           try{
               $location_hard_id = $default_values_if_zero['location_id'];
           }catch (Exception $e) {
               echo "Must have a location id selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $location_type_selector = $this->selectors['location']['type'];
       }catch (Exception $e) {
           $location_type_selector = null;
           try{
               $location_hard_type = $default_values_if_zero['location_type'];
           }catch (Exception $e) {
               echo "Must have a location type selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $currency_selector = $this->selectors['currency']['id'];
           $currency_selector_type = $this->selectors['currency']['type'];
       }catch (Exception $e) {
           $currency_selector = null;
           try{
               $currency_hard = $default_values_if_zero['currency'];
           }catch (Exception $e) {
               echo "Must have a currrency selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $operations_selector = $this->selectors['operations']['id'];
           $operations_selector_type = $this->selectors['operations']['type'];
       }catch (Exception $e) {
           $operations_selector = null;
           try{
               $operations_hard = $default_values_if_zero['operations'];
           }catch (Exception $e) {
               echo "Must have an operations selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $property_types_selector = $this->selectors['property_type']['id'];
           $property_types_selector_type = $this->selectors['property_type']['type'];
       }catch (Exception $e) {
           $property_types_selector = null;
           try{
               $property_types_hard = $default_values_if_zero['property_types'];
           }catch (Exception $e) {
               echo "Must have a property types selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $price_from_selector = $this->selectors['price_range']['min']['id'];
       }catch (Exception $e) {
           $price_from_selector = null;
           try{
               $price_from_hard = $default_values_if_zero['price_from'];
           }catch (Exception $e) {
               echo "Must have a price_from selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $price_to_selector = $this->selectors['price_range']['max']['id'];
       }catch (Exception $e) {
           $price_to_selector = null;
           try{
               $price_to_hard = $default_values_if_zero['price_to'];
           }catch (Exception $e) {
               echo "Must have a price_to selector or a value_if_zero defined ";
               return null;
           }
       }

       echo '<script>';
       echo '$("#'. $search_button_selector  .'").on("click", function(event) {';
       if ($location_id_selector){
           echo "current_localization_id = $('#".$location_id_selector."').val();";
       }else{
           echo "current_localization_id = '".$location_hard_id."';";
       }
       if ($location_type_selector){
           echo "current_localization_type = $('#".$location_type_selector."').val();";
       }else{
           echo "current_localization_type = '".$location_hard_type."';";
       }

       echo 'if(current_localization_id == "0"){';
       echo '    current_localization_id = "'. $default_values_if_zero['location_id'] .'";';
       echo '    current_localization_type = "'. $default_values_if_zero['location_type'] .'";';
       echo '}';

       echo 'if(current_localization_type == "division"){';       
       echo '    current_localization_id = [parseInt(current_localization_id)];';
       echo '}else{';
       echo '    current_localization_id = parseInt(current_localization_id);';
       echo '}';

       if ($currency_selector){
           if ($currency_selector_type =='select'){
               echo "currency = $('#".$currency_selector."').val();";
           }else{
               echo "currency = $(\"input[name='".$currency_selector."']:checked\").val();";
           }
       }else{
           echo "currency = '".$currency_hard."';";
       }

       echo 'if(currency == ""){';
       echo '    currency = "'. $default_values_if_zero['currency'] .'";';
       echo '}';

       if ($operations_selector){
           if ($operations_selector_type =='select'){
               echo "operations = [parseInt($('#".$operations_selector."').val())];";
           }else{
               if ($operations_selector_type =='radiobutton'){
                   echo "operations = [parseInt($(\"input[name='".$operations_selector."']:checked\").val())];";
               }else{
                   echo "operations = jQuery.map($(\"input[name='.$operations_selector.']:checked\"), function(element) { return parseInt(jQuery(element).val()); });";
               }
           }
       }else{
           echo "operations = '".$operations_hard."';";
       }

       echo 'if(operations[0] == 0 || !operations){';
       echo '    operations = '. $default_values_if_zero['operations'] .';';
       echo '}';

       if ($property_types_selector){
           if ($property_types_selector_type =='select'){
               echo "property_types = [parseInt($('#".$property_types_selector."').val())];";
           }else{
               echo "property_types = jQuery.map($(\"input[name='.$property_types_selector.']:checked\"), function(element) { return parseInt(jQuery(element).val()); });";
           }
       }else{
           echo "property_types = '".$property_types_hard."';";
       }

       echo 'if(property_types[0] == 0 || !property_types){';
       echo '    property_types = '. $default_values_if_zero['property_types'] .';';
       echo '}';

       if ($price_from_selector){
           echo "price_from = parseInt($('#".$price_from_selector."').val());";
       }else{
           echo "price_from = ".$price_from_hard.";";
       }

       echo 'if(price_from == 0){';
       echo '    price_from = '. $default_values_if_zero['price_from'] .';';
       echo '}';

       if ($price_to_selector){
           echo "price_to = parseInt($('#".$price_to_selector."').val());";
       }else{
           echo "price_to = ".$price_to_hard.";";
       }

       echo 'if(price_to == 0){';
       echo '    price_to = '. $default_values_if_zero['price_to'] .';';
       echo '}';

       echo 'filters = [];';
       foreach(array_keys($this->filters) as $field){
           foreach(array_keys($this->filters[$field]) as $op){
               echo 'filters.push(["'.$field.'", "'.$op.'", parseInt($("#'.$this->filters[$field][$op]["id"].'").val())]);';
           }
       }

       if ($filter_gen_function){
           echo "filters.push.apply(filters, ".$filter_gen_function.");";
       }

       echo "var data = {'current_localization_id': current_localization_id,";
       echo "            'current_localization_type': current_localization_type,";
       echo "            'price_from': price_from,";
       echo "            'price_to': price_to,";
       echo "            'operation_types': operations,";
       echo "            'property_types': property_types,";
       echo "            'currency': currency,";
       echo "            'filters': filters,";
       echo '};';
       echo "window.location = '". $url ."?order_by=".$order_by."&limit=".$limit."&order=".$order."&page=1&data=' + JSON.stringify(data);";
       echo '     } );';
       echo "</script>";
   }

}
