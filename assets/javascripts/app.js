(function($){

  $('.addPanier').click(function(event){
    // event.preventDefault();
    $.get($(this).attr('href'),{},function(data){
      if(data.error){
        alert(data.message);
      }else{
        if(confirm(data.message + '. Voulez-vous consulter votre panier ?')){
          location.href = '../views/panier.php';
        }else{
          //$('#total').empty().append(data.total);
          $('#count').empty().append(data.count);
        }
      }
    },'json');
    return false;
  });

})(jQuery);

(function($){

  $('.plusPanier').click(function(event){
    // event.preventDefault();
    $.get($(this).attr('href'),{},function(data){
      if(data.error){
        alert(data.message);
      }else{
        if(confirm(data.message + '. Voulez-vous consulter votre panier ?')){
          location.href = '../views/panier.php';
        }else{
          //$('#total').empty().append(data.total);
          $('#count').empty().append(data.count);
        }
      }
    },'json');
    return false;
  });

})(jQuery);

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
