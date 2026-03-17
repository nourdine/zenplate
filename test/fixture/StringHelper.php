<?php

declare(strict_types=1);

use Zenplate\Helper\Helper;

class StringHelper extends Helper
{
   public function upperc(string $str): string
   {
      return strtoupper($str);
   }
}