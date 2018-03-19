$(document).ready(function(){
     $('.add_button').click(function(){
     var button;
     var list;
     button=$(this); // объект кнопка
     $.ajax({
          url: '/get_parameters',
          type: "POST",
          headers: {
               'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
           success: function($list){
                button.after($list);
           },
           error: function(msg){
              console.log(msg);
          }
   });
});
$(document).on('click','.remove_button',function(){
  var block;
  if(confirm('Delete?'))
  {
     block=$(this).closest('.form-inline');
     block.remove();
  }
});

  $(document).on('click','.add_parameter',function(){
    $('#myModal').modal();
  });

$('.save_and_close').click(function(){
var title;
var unit;
title=$('.parameter_modal').val();
unit=$('.unit_modal').val();
$.ajax({
     url: '/save_parameters',
     method: 'POST',
     data: {title:title,unit:unit},
     headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
              },
     success: function(param)
     {
     $('select').append($('<option>', {value:param[0], text: param[1]+' ('+param[2]+')'}));//добавляем к существующему списку новый параметр
     $('#myModal').modal('hide');
     },
     error: function(msg){
          console.log(msg);
     }
  });
});

$('.add_images').click(function(){
    all_images=$('input[name="preview[]"]');
    if(all_images.length>10) return; //ограничим количество картинок 1 превью и 10 дополнительных картинок.
    field=$('input[name="preview[]"]:first').clone(); // клонируем поле preview
    $(this).after(field); //вставляем поле после кнопки
})

});