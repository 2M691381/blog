<?php $this->title = ' Ajouter un article' ?>

<?php
    //ENREGISTREMENT DU TOKEN
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
?>

<div class="container" id="viewAddArticle">

	<p><a class="btn btn-primary btn-lg" id=btnreturn href="index.php?action=posts" role="button"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>Retour</a></p>

	<h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>AJOUTER UN ARTICLE</h2>
	<form class="formnewarticle" method="POST" action="index.php?action=addPost">
	  <div class="form-group">
	  	 <p>Veuillez saisir votre nouvel article en remplissant les champs ci-dessous.</p>
	  </div>
	  <div class="form-group">
	     <label for="exampleInputEmail1">Auteur</label>
	     <input type="text" class="form-control" id="exampleInputEmail1" name="users_id" placeholder="Auteur" required>
	  </div>
	  <div class="form-group">
	     <label for="exampleInputEmail1">Titre</label>
	     <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Auteur" required>
	  </div>
	  <div class="form-group">
	     <label for="exampleInputEmail1">Chapo</label>
	     <textarea class="form-control" rows="5" name="chapo" placeholder="chapo" required></textarea>
	  </div>
	  <div class="form-group">
	     <label for="exampleInputEmail1">Contenu</label>
	     <textarea class="form-control" rows="5" name="content" placeholder="content" required></textarea>
	  </div>
	  <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
	  <button type="submit" class="btn btn-primary" id=btnnewarticle>Envoyer</button>
	</form>

</div>