<?php $this->titre = 'Blog - Article -' . $this->clean($posts->getTitle()); ?>

<div class="container" id="viewArticleComments">

	<p><a class="btn btn-primary btn-lg" id=btnreturn href="index.php?action=post" role="button"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>Retour</a></p>

	<?php if (!empty($_SESSION['admin'])) { ?>

		<div class="row">
			<div class="col-sm-12 col-md-3 col-lg-2">
				<p><a href="index.php?action=editPosts&id=<?= $posts->getId() ?>"><button type="button" class="btn btn-primary btn-lg" "><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Modifier l'article</button></a></p>
			</div>
			<div class="col-sm-12 col-md-3 col-lg-2">
				<p><a href="index.php?action=deletePosts&id=<?= $posts->getId() ?>"><button type="button" class="btn btn-primary btn-lg" "><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer l'article</button></a></p>
			</div>
		</div><br />
		<div class="row" id=infoadmin>
				<p> <span class="label label-info">Info</span> Bonjour l'admin, vous pouvez désormais modifier ou supprimer un article.</p>
	    </div>

	<?php } ?>
   
	<h1><?= $this->clean($posts->getTitle()) ?></h1>

	<p><em>Mis à jour le <?= $this->clean($posts->getDate_create_fr()) ?>.</em></p>

	<p><strong><?= $this->clean($posts->getChapo()) ?></strong></p>

	<p><?= $this->clean($posts->getContent()) ?></p>

	<p class="titlecomment"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Commentaires :</p>

	<?php foreach ($comments as $comment): ?>
		<div class="contentcomment">
		<p><em>Par <?= $this->clean($comment->getAuthor()) ?>, le <?= $this->clean($comment->getDate_comment_fr()) ?>.</em></p>
		<p><?= $this->clean($comment->getComment()) ?></p>
	    </div>
		<hr>
	<?php endforeach; ?>

	<form class="formarticle" method="POST" action="index.php?action=comment&id=<?= $posts->getId() ?>"> 
		  <div class="form-group">
		  	 <p>Vous pouvez laisser un commentaire sur l'article en remplissant attentivement les champs ci-dessous.</p>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Pseudo</label>
		     <input type="text" class="form-control" id="exampleInputEmail1" name="author" placeholder="Pseudo" required>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Commentaire</label>
		     <textarea class="form-control" rows="5" name="comment" placeholder="Commentaire" required></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary" id=btncomment>Soumettre</button>
	</form>

</div>


