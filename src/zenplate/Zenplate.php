<?php

namespace zenplate;

use zenplate\helper\Helper;
use zenplate\helper\MessagePrinter;
use zenplate\helper\Shortener;
use zenplate\helper\Time;

class Zenplate
{

   protected static $helpers = [];

   public static function load($path, array $data = [])
   {
      $helpers = self::$helpers;
      extract($data);
      ob_start();
      include $path;
      return ob_get_clean();
   }

   public static function addHelper(string $name, Helper $helper)
   {
      self::$helpers[$name] = $helper;
   }
}

Zenplate::addHelper("time", new Time());
Zenplate::addHelper("shortener", new Shortener());
Zenplate::addHelper("mprinter", new MessagePrinter());
