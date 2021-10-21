<?php $this->titre = 'Blog - Articles'; ?>

<header style="background-image: url('assets/img/img1.jpg')">
	<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Liste des articles<span>
                        <hr class="star-light">
                    </div>
                </div>
            </div>
        </div>
</header>

<div class="container" id="viewArticle">

    <?php if (!empty($_SESSION['admin'])) { ?>
        <div>
           <a href="index.php?action=addPosts"><button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> AJOUTER UN ARTICLE</button></a><br />
        </div><br />
        <div class="row" id=infoadmin>
        	 <p> <span class="label label-info">Info</span> Bonjour l'admin, vous pouvez désormais ajouter un article.</p>
        </div>
    <?php } ?>

  <div class="row" id="content">
       <?php foreach ($post as $posts): ?>
           <h2><?= $this->clean($posts->getTitle()) ?></h2>
           <p><?= $this->clean($posts->getChapo()) ?></p>
           <p class="datearticle"><em>Article mis à jour le <?= $this->clean($posts->getDate_create_fr()) ?>.</em></p><br />
           <p><a class="btn btn-primary btn-lg pull-right" href="index.php?action=posts&id=<?= $posts->getId(); ?>" role="button">Lire l'article</a></p><br /><br />
           <hr>
       <?php endforeach; ?>
  </div>

</div>