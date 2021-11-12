<?php

namespace blog\lib;

class View 
{

  // Nom du fichier associé à la vue
  private $file;
  // Titre de la vue (défini dans le fichier vue)
  private $title;

  public function __construct($action) {
      // Détermination du nom du fichier vue à partir de l'action
      $this->file = "app/View/view" . $action . ".php";
  }

  // Nettoie une valeur insérée dans une page HTML
  private function clean($value)
  {
      return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
  }

  // Génère et affiche la vue
  public function generer($datas)
  {
      // Génération de la partie spécifique de la vue
      $content = $this->genererFile($this->file, $datas);
      // Génération du gabarit commun utilisant la partie spécifique
      $vue = $this->genererFile('app/View/layout.php',
        array('title' => $this->title, 'content' => $content));
      // Renvoi de la vue au navigateur
      echo $vue;
  }

  // Génère un fichier vue et renvoie le résultat produit
  private function genererFile($file, $datas)
  {
      if (file_exists($file)) {
        // Rend les éléments du tableau $donnees accessibles dans la vue
        extract($datas);
        // Démarrage de la temporisation de sortie
        ob_start();
        // Inclut le fichier vue
        // Son résultat est placé dans le tampon de sortie
        require $file;
        // Arrêt de la temporisation et renvoi du tampon de sortie
        return ob_get_clean();
      } else {
          throw new \Exception("Fichier '$fichier' introuvable");
      }
  }
}


