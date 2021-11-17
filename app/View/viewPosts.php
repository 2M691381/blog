<?php $this->title = 'Liste des articles du blog'; ?>

<header style="background-image: url('assets/img/img1.jpg')">
	<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <h1>Les derniers articles du blog</h1>
                        <hr class="star-light">
                    </div>
                </div>
            </div>
        </div>
</header>


<div class="container" id="viewArticle">

<!-- On vérifie si l'admin est connecté pour ajouter un article ( fontionne ), sinon on dit bonjour si un membre est connecté ( ne fonctionne pas ) -->
<?php if ($_SESSION['admin'] == 1) { ?>
        <div>
           <a href="index.php?action=addPost"><button type="button" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> AJOUTER UN ARTICLE</button></a><br />
        </div><br />
        <div class="row" id=infoadmin>
        	 <p> <span class="label label-info">Info</span> Bonjour l'admin, vous pouvez désormais ajouter un article.</p>
        </div>
    
                    <?php } ?>


<!-- On appelle chaque post dans une boucle -->
  <div class="row" id="content">
       <?php foreach ($posts as $post): ?>
           <h2><?= $this->clean($post->getTitle()) ?></h2>
           <p><?= $this->clean($post->getChapo()) ?></p>
           <p class="datearticle"><em>Article publié le <?= $this->clean($post->getUpdated_date_fr()) ?>.</em></p><br />
           <p><a class="btn btn-primary btn-lg pull-right" href="index.php?action=post&id=<?= $post->getPosts_id(); ?>" role="button">Lire cet article</a></p><br /><br />
           <hr>
       <?php endforeach; ?>
  </div>

</div>
