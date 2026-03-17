<?php

declare(strict_types=1);

namespace Zenplate;

use Zenplate\Helper\Helper;
use Zenplate\Helper\MessagePrinter;
use Zenplate\Helper\Shortener;
use Zenplate\Helper\Time;

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
