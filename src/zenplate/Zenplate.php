<?php

namespace zenplate;

use zenplate\helper\Helper;
use zenplate\helper\MessagePrinter;
use zenplate\helper\Shortener;
use zenplate\helper\Time;

class Zenplate {

   protected static $helpers = [];

   public static function load($path, array $data = []) {
      $helpers = self::$helpers;
      extract($data);
      ob_start();
      include $path;
      return ob_get_clean();
   }

   public static function addViewHelper($name, Helper $helper) {
      self::$helpers[$name] = $helper;
   }
}

Zenplate::addViewHelper("time", new Time());
Zenplate::addViewHelper("short", new Shortener());
Zenplate::addViewHelper("mprinter", new MessagePrinter());
