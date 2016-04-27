<?php require '../views/includes/header_logged.php' ?>
<?php require_once '../controllers/form_contact.php'; ?>

<div class="col-md-offset-1 col-md-10 titre-contact">
	<h1>CONTACTEZ-NOUS</h1>
</div>

<div class="col-md-offset-1 col-md-10 contact-form">

	<form method="POST" action="" id="contact" onSubmit="">

			<!-- Text input-->
			<div class="form-group">
				<input id="nom" name="nom" type="text" placeholder="NOM" required="">
			</div>

			<!-- Text input-->
			<div class="form-group">
				<input id="mail" name="mail" type="email" placeholder="E-MAIL" required="">
			</div>

			<!-- Text input-->
			<div class="form-group">
				<input id="objet" name="objet" type="text" placeholder="OBJET" required="">
			</div>

			<!-- Textarea -->
			<div class="form-group" id="bordernone">
				<textarea id="mpBox" name="mpBox" placeholder="MESSAGE"></textarea>
			</div>
			<!-- <div class="hp">
				<label>Si vous êtes un humain, laissez ce champ vide</label>
				<input type="checkbox" name="comment" class="robot">
			</div> -->
			<!-- Button -->
			<div class="form-group" id="margin-borderNone">
				<button type="submit" name="singlebutton" onclick="">ENVOYER</button>
			</div>

	</form>

</div>

<?php require '../views/includes/footer.php'; ?>
