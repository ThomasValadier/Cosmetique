<?php
require 'includes/header_logged.php';

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['pseudo']) && !empty ($_POST['message'])) {
        $message = addslashes(htmlspecialchars($_POST['message']));
        $DB->insert("INSERT INTO message VALUES ('', '', '', '$message', now()) ");

    }
}
?>


<form action="" method="post">
    <input name="pseudo" type="text" placeholder="Votre Pseudo"></br>
    <textarea  name="message" type="text" placeholder="Votre message"></textarea>
    <button name="envoyer">Envoyer</button>
</form>
