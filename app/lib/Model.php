<?php

namespace blog\lib;

use blog\lib\Config;

abstract class Model 
{
    private static $bdd;

    protected function executerRequete($sql, $params = null) 
    {
        if ($params == null) {
            $resultat = self::getBdd()->query($sql);   // exécution directe
        } else {
            $resultat = self::getBdd()->prepare($sql); // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    private static function getBdd() 
    {
        if (self::$bdd === null) {
            // Récupération des paramètres de configuration BD
            $dsn = Config::get("dsn");
            $login = Config::get("login");
            $mdp = Config::get("mdp");
            // Création de la connexion
              self::$bdd = new \PDO('mysql:host=localhost;dbname=bblog;charset=utf8;port=3307', 'root', 'root', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
      }
        return self::$bdd;
    }

}