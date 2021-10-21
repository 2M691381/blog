<?php 

namespace blog\lib;

class Request
{
	public function getParametre($array, $name) 
    {
        if (isset($array[$name])) {
          return htmlspecialchars($array[$name]);
        } 
          	throw new \Exception("Paramètre '$name' absent");
    }
}