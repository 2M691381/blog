<?php $this->title = ' Dashboard Administration'; ?>

<div class="container" id="viewAdmin">


<!-- Dashboard admin avec validation ou suppresssion des utilisateurs et commentaires -->
	  <h2>Liste des utilisateurs à valider</h2>

	  <div class="row" id="content">
	       <?php foreach ($users as $user): ?>
	           <p><?= $this->clean($user->getLogin()) ?> - <a href="index.php?action=confirmuser&id=<?= $user->getUsers_id(); ?>">Valider cet utilisateur</a> - <a href="index.php?action=noconfirmuser&id=<?= $user->getUsers_id(); ?>">Supprimer cet utilisateur</a></p>
	           <hr>
	       <?php endforeach; ?>
	  </div>

	    <h2>Liste des comentaires à valider</h2>

	  <div class="row" id="content">
	       <?php foreach ($commentsApprouve as $commentApprouve): ?>
	           <p> Commentaire par <?= $this->clean($commentApprouve->getLogin()) ?> le <?= $this->clean($commentApprouve->getComment_date_fr()) ?></p>
	           <p><?= $this->clean($commentApprouve->getComment()) ?></p>
	           <a href="index.php?action=confirmcomment&id=<?= $commentApprouve->getComments_id(); ?>">Valider ce commentaire</a> - <a href="index.php?action=noconfirmcomment&id=<?= $commentApprouve->getComments_id(); ?>">Supprimer ce commentaire</a>
	           <hr>
	       <?php endforeach; ?>
	  </div>

</div>

