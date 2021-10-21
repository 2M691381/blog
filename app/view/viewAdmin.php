<?php $this->titre = 'Blog - Administration'; ?>

<div class="container" id="viewAdmin">

	  <h2>Liste des utilisateurs inscrits</h2>

	  <div class="row" id="content">
	       <?php foreach ($users as $user): ?>
	           <p><?= $user->getId() ?> : <?= $this->clean($user->getLogin()) ?> - <a href="index.php?action=confirmadmin&id=<?= $user->getId(); ?>">Admin</a> - <a href="index.php?action=noconfirmadmin&id=<?= $user->getId(); ?>">Pas admin</a></p> 
	           <hr>
	       <?php endforeach; ?>
	  </div>

	    <h2>Liste des commentaires à valider</h2>

	  <div class="row" id="content">
	       <?php foreach ($commentsApprouve as $commentApprouve): ?>
	           <p> Article n°<?= $commentApprouve->getId_article() ?> par <?= $this->clean($commentApprouve->getAuthor()) ?> le <?= $this->clean($commentApprouve->getComment_date_fr()) ?></p>
	           <p><?= $this->clean($commentApprouve->getComment()) ?></p>
	           <a href="index.php?action=confirmcomment&id=<?= $commentApprouve->getId(); ?>">Approuver</a> - <a href="index.php?action=noconfirmcomment&id=<?= $commentApprouve->getId(); ?>">Non approuver</a>
	           <hr>
	       <?php endforeach; ?>
	  </div>

</div>

