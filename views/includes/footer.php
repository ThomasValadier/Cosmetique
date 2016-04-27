<div class="col-md-offset-1 col-md-10 footer">
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script scr"assets/javascripts/app.js"></script>

<!-- INTERDIT MAIS PROBLEME D'INTEGRATION DU JS -->
<!-- <script type="text/javascript">
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

    //- MODAL CONNEXION -//
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    });

    //- ANIMATION SLIDE COMMENTAIRE -//
    function slide() {
        $("#slide-commentaire").click(function() {
            $(".content-list-commentaire").toggleClass("after-slide-commentaire");
            console.log('hello');
        });
    };

    // function slide(){
	// 	if(document.getElementsByClass('.content-list-commentaire').style.display == 'none'){
    // 	document.getElementsByClass('.content-list-commentaire').style.display = 'block';
 //  		}
 //  		else {
    // 	document.getElementsByClass('.content-list-commentaire').style.display = 'none';
	// 	}
    // }

    // $(function() {
    //     $("#slide-commentaire").on("click", function() {
    //         $(this).next(".content-list-commentaire").slideToggle(200);
    //     });
    //     $(".content-list-commentaire").on("click", function() {
    //         $(this).slideUp(200);
    //     });
    // });
</script> -->


</body>
</html>
