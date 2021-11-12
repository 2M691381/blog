<?php

namespace blog\lib;

class Config
{

    private static $parameters;

    // Renvoie la valeur d'un paramètre de configuration
    public static function get($name, $DefautValue = null)
    {
        if (isset(self::getParameters()[$name])) {
          $value = self::getParameters()[$name];
        } else {
          $value = $DefautValue;
        }
        return $value;
    }

    // Renvoie le tableau des paramètres en le chargeant au besoin
    private static function getParameters()
    {
        if (self::$parameters == null) {
          $folderPath = "app/Config/prod.ini";
          if (!file_exists($folderPath)) {
            $folderPath = "app/Config/dev.ini";
          }
          if (!file_exists($folderPath)) {
            throw new Exception("Aucun fichier de configuration trouvé");
          } else {
              self::$parameters = parse_ini_file($folderPath);
          }
        }
        return self::$parameters;
    }
}