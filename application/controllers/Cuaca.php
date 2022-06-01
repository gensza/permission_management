<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuaca extends CI_Controller
{

      public function index()
      {
            $file = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=jakarta" .
                  "&appid=3c95727e876f0dbb3def499ea46fb708");
            $cuaca = json_decode($file, true);
            var_dump($cuaca['weather']);
            die;
      }
}

/* End of file Cuaca.php */
