<!-- MODAL CONNEXION -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Se connecter</h3>
      </div>
      <form class="sign-up" method="post" action="../controllers/connexion.php">
          <div class="modal-body">
                <input type="text" name="pseudo" class="sign-up-input" placeholder="Identifiant" required="required" autofocus>
                <input type="password" name="password" class="sign-up-input" placeholder="Mot de passe" required="required">
          </div>
          <div class="modal-footer">
            <a href="../views/register.php">s'inscrire</a>
            <input type="submit" name="connexion" value="connexion" class="sign-up-button">
          </div>
      </form>
    </div>
  </div>
</div>
