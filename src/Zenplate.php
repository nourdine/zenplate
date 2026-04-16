<?php

declare(strict_types=1);

namespace Zenplate;

use Zenplate\Helper\Helper;
use Zenplate\Helper\MessagePrinter;
use Zenplate\Helper\Shortener;
use Zenplate\Helper\Sub;
use Zenplate\Helper\Time;

final class Zenplate
{
   private static $helpers = [];

   public static function load(string $path, array $data = []): string
   {
      $helpers = self::$helpers;
      extract($data);
      ob_start();
      include $path;
      return ob_get_clean();
   }

   public static function addHelper(string $name, Helper $helper): void
   {
      self::$helpers[$name] = $helper;
   }
}

Zenplate::addHelper("sub", new Sub());
Zenplate::addHelper("time", new Time());
Zenplate::addHelper("shortener", new Shortener());
Zenplate::addHelper("mprinter", new MessagePrinter());
