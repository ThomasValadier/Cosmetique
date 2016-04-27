(function($){

  $('.addPanier').click(function(event){
      //event.preventDefault();
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

//- MODAL CONNEXION -//
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
});

//- ANIMATION SLIDE COMMENTAIRE -//
// $("#slide-commentaire").click(function() {
//     //$(".content-commentaire").toggleClass("after-slide-commentaire");
//     console.log('Hello');
// });

function slide() {
   alert("Message sur la ligne 1.nMessage sur la ligne 2.n...")
};
