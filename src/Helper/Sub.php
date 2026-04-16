<?php

declare(strict_types=1);

namespace Zenplate\Helper;

use Zenplate\Helper\Helper;
use Zenplate\Zenplate;

class Sub extends Helper
{
   /**
    * Load a sub-template and return its compiled content.
    *
    * @param string $path The path to the sub-template
    * @param array $data The data to be exposed to the sub-template
    *
    * @return string
    */
   public function load(string $path, array $data = []): string
   {
      return Zenplate::load($path, $data);
   }
}
