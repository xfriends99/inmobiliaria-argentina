$(document).ready(function(){
    $('.iCheck-helper').click(function(){
        var checkbox = $(this).prev();
        var clase = $(this).prev().attr('class');
        var input = $('#'+clase);
        if(checkbox.is(':checked')){
            if(input.val()!=''){
                input.val(input.val()+','+checkbox.val());
            } else {
                input.val(checkbox.val());
            }
        }  else {
            if(input.val().indexOf(','+checkbox.val())!==-1){
                value = input.val().replace(','+checkbox.val(), '');
            } else if(input.val().indexOf(checkbox.val()+',')!==-1){
                value = input.val().replace(checkbox.val()+',', '');
            } else {
                value = input.val().replace(checkbox.val(), '');
            }
            input.val(value);
            if(clase=='partidos'){
                var elements = checkbox.attr('data-value').split(',');
                for(var i = 0; i<elements.length; i++){
                    $('.keyword[value="'+elements[i]+'"]').attr('checked', false);
                }
            }
        }
    });

    $('.buscar').click(function(e){
        if($('#preciodesde').val()!='' && $('#preciohasta').val()!='' && parseInt($('#preciodesde').val())>parseInt($('#preciohasta').val())){
            e.preventDefault();
            return false;
        }
    });
});