<?php $this->title = 'Mickaël Grole - ' . $this->clean($post->getTitle()); ?>

<div class="container" id="viewArticleComments">

	<p><a class="btn btn-primary btn-lg" id=btnreturn href="index.php?action=posts" role="button"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>Retour</a></p>


<!-- On vérifie si l'admin est connecté pour modifier ou supprimer cet article ( fontionne ), sinon on dit bonjour si un membre est connecté ( ne fonctionne pas ) -->
	<?php if ($_SESSION['admin'] == 1) { ?>

		<div class="row">
			<div class="col-sm-12 col-md-3 col-lg-3">
				<p><a href="index.php?action=editPost&id=<?= $post->getPosts_id() ?>"><button type="button" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Modifier cet article</button></a></p>
			</div>
			<div class="col-sm-12 col-md-3 col-lg-2">
				<p><a href="index.php?action=deletePost&id=<?= $post->getPosts_id() ?>"><button type="button" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer cet article</button></a></p>
			</div>
		</div><br />
		<div class="row" id=infoadmin>
				<p> <span class="label label-info">Info</span> Bonjour l'admin, vous pouvez désormais modifier ou supprimer cet article.</p>
	    </div>
 <?php } else { ($_SESSION['id'] == 2) ?>
                            <div class="row" id=infoadmin>
             <p> <span class="label label-info">Info</span><?php echo ' Bonjour ' . $login .' ,'; ?> vous pouvez désormais commenter cet article.</p>
        </div>
                    <?php } ?>

   
<!-- On appelle chaque champs de l'article et les commentaires valldés -->
<h1><?= $this->clean($post->getTitle()) ?></h1>

	<p><em>Par <?= $this->clean($post->getLogin()) ?>, le <?= $this->clean($post->getCreated_date_fr()) ?>.</em></p>

	<p><strong><?= $this->clean($post->getChapo()) ?></strong></p>

	<p><?= $this->clean($post->getContent()) ?></p>

	<p class="titlecomment"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Commentaires :</p>

	<?php foreach ($comments as $comment): ?>
		<div class="contentcomment">
		<p><em>Par <?= $this->clean($comment->getLogin()) ?>, le <?= $this->clean($comment->getComment_date_fr()) ?>.</em></p>
		<p><?= $this->clean($comment->getComment()) ?></p>
	    </div>
		<hr>
	<?php endforeach; ?>


<!-- On affiche la partie poster un commentaire pour les utilisateurs inscrits -->
<?php
    //ENREGISTREMENT DU TOKEN
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
?>

<form class="formarticle" method="POST" action="index.php?action=comment&id=<?= $post->getPosts_id() ?>&amp;userId=11">
	<div class="form-group">
		  	 <p>Laissez-moi un commentaire si vous avez aimé cet article.</p>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Pseudo</label>
		     <input type="text" class="form-control" id="exampleInputEmail1" name="login" placeholder="Pseudo" required>
		  </div>
		  <div class="form-group">
		     <label for="exampleInputEmail1">Commentaire</label>
		     <textarea class="form-control" rows="5" name="comment" placeholder="Commentaire" required></textarea>
		  </div>
		  <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
			<div class="col-lg-6 col-md-6 col-sm-6">
		  <button type="submit" class="btn btn-primary" id=btncomment>Soumettre</button>
		</div>
	</form>

</div>


