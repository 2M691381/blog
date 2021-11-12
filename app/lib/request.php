<?php 

namespace blog\lib;

class Request
{
	public function getParameter($array, $name)
    {
        if (isset($array[$name])) {
          return htmlspecialchars($array[$name]);
        } 
          	throw new \Exception("Paramètre '$name' absent");
    }
}