P5 OCR MICKAEL GROLE

modif app config dev et app lib model pour changer champs bdd si nécessaire .

installer composer autoload psr4
installer phpmailer
voir fichier json

connexion au site admin mickael et user marine ( voir bdd) pass = 123456 pour tous
-------------------------------------------------------------------------------------------------

Au 18 novembre, reste à faire :


Formulaires de contact fonctionne en ligne seulmeent avec compte gmail et phpmailer via composer

Suppression et edition de posts ne fonctionnent pas ( l'édition n'enregistre aucune modif en bdd et la suppression m'informe :
"Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`bblog`.`Comments`, CONSTRAINT `fk_Comments_Posts1` FOREIGN KEY (`posts_id`) REFERENCES `Posts` (`posts_id`) ON DELETE NO ACTION ON UPDATE NO ACTION)"

sécuriser le site

code sniffer pour les psr12 et indentation à réappliquer ( NB : il indique qu'une ligne vide doit exister en fin de fichier et les AND doivent être en minuscule, bizarre !!!)

voir codacy ou SI

finir github

modif quelques lignes css pour mobile

créer page vue confirmation edition posts

--------------------------------------------------------------------

Site disponible en ligne mickaelgrole.com .
