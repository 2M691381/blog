<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="content-language" content="fr">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blog PHP SQL MVC POO">
    <meta name="author" content="Mickaël Grolé">
    <meta name="robots" content="noindex">


    <title><?= $title ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/Bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="assets/Bootstrap/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/Bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Mickaël Grolé</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php?">ACCUEIL</a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php?action=posts"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> BLOG</a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php?#contactForm"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> CONTACT</a>
                    </li>
                    <?php if (!empty($_SESSION['id'])) { ?>
                            <li class="page-scroll">
                            <a href="index.php?action=disconnectUser"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> ME DECONNECTER</a>
                            </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
       
            <?= $content ?>  
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-12">
                        <h3>Suivez-moi sur les réseaux sociaux :</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.linkedin.com/in/mickaelgrole/" target="blank" rel="nofollow" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="https://github.com/2M691381/" target="blank" rel="nofollow" class="btn-social btn-outline"><i class="fa fa-fw fa-github"></i></a>
                            </li>
                        </ul><br />
                        <?php 

                        if (empty($_SESSION['id'])) { ?>
                                <div class="pageadmin">
                                <h5><a href="index.php?action=addUser"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> CONNEXION ADMIN</a></h5>
                                </div>
                        <?php } elseif ($_SESSION['admin'] == 1) { ?>
                                    <div class="pageadmin">
                                    <h5><a href="index.php?action=admin"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> PAGE ADMINISTRATION</a></h5>
                                    </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright 2021 - <a href="https://www.mickaelgrole.fr" title="Consultant Expert SEO SMO Lyon 69">Mickaël Grolé</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <!-- jQuery -->
    <script src="assets/Bootstrap/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/Bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="assets/Bootstrap/js/jqBootstrapValidation.js"></script>
    <script src="assets/Bootstrap/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="assets/Bootstrap/js/freelancer.min.js"></script>

</body>

</html>