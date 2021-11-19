<?php $this->title = 'Modifier cet article' ?>

<?php
    //ENREGISTREMENT DU TOKEN
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
?>

<!-- Ne fait pas la référence entre users_id et login -->
<div class="container" id="viewEditArticle">
	<p><a class="btn btn-primary btn-lg" id=btnreturn href="index.php?action=post&id=<?= $_GET['id'] ?>" role="button"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>Retour</a></p>
	<h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>MODIFIER UN ARTICLE</h1>
	<form class="formeditarticle" method="POST" action="index.php?action=editPost&id=<?= $_GET['id'] ?>">
		  <div class="form-group">
		  	 <p>Veuillez modifier cet article en remplissant les champs ci-dessous.</p>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Auteur</label>
		     <input type="text" class="form-control" id="exampleInputEmail1" name="users_id" placeholder="Auteur" value="<?= $post->getUsers_id() ?>" required>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Titre</label>
		     <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Titre" value="<?= $post->getTitle() ?>" required>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Chapo</label>
		     <textarea class="form-control" rows="5" name="chapo" placeholder="chapo de l'article" required><?= $post->getChapo() ?></textarea>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Contenu</label>
		     <textarea class="form-control" rows="5" name="content" placeholder="contenu" required><?= $post->getContent() ?></textarea>
		  </div>
		  <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
		  <button type="submit" class="btn btn-primary" id=btneditarticle>Modifier</button>
	</form>
</div>


