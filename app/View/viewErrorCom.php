<?php $this->title = '"Oups, la connexion est obligatoire !"'; ?>

<div class="container" id="viewError">
    <h2><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> "Désolé, mais pour pouvoir commenter un article, vous devez vous inscrire ou vous connecter . Vous serez redirigé sous 10 secondes... <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span></h2>
</div>
<?php             header('Refresh: 5; index.php?action=addUser');
