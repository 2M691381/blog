<?php $this->title = 'Supprimer cet article' ?>

<?php
    //ENREGISTREMENT DU TOKEN
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
?>

<div class="container" id="viewDeletePost">
  <form class="formdeletearticle" method="post" action="index.php?action=deletePost&id=<?= $_GET['id'] ?>">
	  	<h1><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Voulez-vous vraiment supprimer l'article ?</h1>
		<div class="row">
			<input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
			<div class="col-lg-6 col-md-6 col-sm-6">
				<p><a href="index.php?action=post&id=<?= $_GET['id'] ?>"><button type="button" class="btn btn-primary btn-lg" >Non</button></a></p>
		    </div>
		    <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
			<div class="col-lg-6 col-md-6 col-sm-6">
				<p><button type="submit" class="btn btn-primary btn-lg" >Oui</button></p>
			</div>
	    </div>
  </form>
</div>
