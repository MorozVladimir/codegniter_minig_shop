
$(document).ready(function() {
    
  $('#login').blur(function() {                          
    var login = $('#login').val();
    $.post('/mining_shop/ajax/username_taken',
      { 'login':login },
      function(result) {
        $('#bad_username').replaceWith('');
        if (result==='1') {
          $('#login').after('<div id="bad_username" style="color:red;">' +
            '<p>Данный логин занят. Выберите другой логин.</p></div>');
        }
      }
    );
  });  
  
  $('.to_basket a').click(function(event){
        event.preventDefault();
        var gid = $(this).attr('id');
        $.post('/mining_shop/ajax/set_good',
          { 'gid':gid },
        function(result){
            var d = JSON.parse(result);
            $('#good_number').text(d.number_orders);
            $('#good_all_price').text(d.sum_price);
        }
    );
  }); 
  
  $('.plus_good').click(function(){
      event.preventDefault();
        var gid = $(this).attr('id');
        $.post('/mining_shop/ajax/plus_good_get_grup_good',
          { 'gid':gid },
        function(result){
            var d = JSON.parse(result);
            $('#'+gid+'s_num').text(d.number_orders);
            $('#'+gid+'s_p').text(d.sum_price);
        }
    );
  });
  
  $('.minus_good').click(function(){
      event.preventDefault();
        var gid = $(this).attr('id');
        $.post('/mining_shop/ajax/minus_good_get_grup_good',
          { 'gid':gid },
        function(result){
            var d = JSON.parse(result);
            if(d.number_orders===0){window.location = 'edit_orders';}
            else{
            $('#'+gid+'s_num').text(d.number_orders);
            $('#'+gid+'s_p').text(d.sum_price);}
        }
      ); 
  });
  
  $('.reset_order').click(function(){
      event.preventDefault();
        var uid = $(this).attr('id');
        $.post('/mining_shop/ajax/reset_order',
          { 'uid':uid },
        function(result){
            var d = JSON.parse(result);
            if(d.a==='ok'){window.location = 'edit_orders';}
        }
      ); 
  });
  
  $('.submit_order').click(function(){
      event.preventDefault();
        var uid = $(this).attr('id');
        $.post('/mining_shop/ajax/submit_order',
          { 'uid':uid },
        function(result){
            var d = JSON.parse(result);
            if(d.a==='ok'&&d.title==='Подтвержение заказа'){window.location = 'submit_orders';}
        }
      ); 
  });
  
});


