<?php

use PHPUnit\Framework\TestCase;
use zenplate\Zenplate;

class ZenplateTest extends TestCase
{

   public function testVariablesResolution()
   {
      $html = Zenplate::load(__DIR__ . "/../fixture/tmpl.php", array(
         "a" => 1,
         "b" => 2,
         "c" => 3
      ));

      $this->assertEquals($html, "123");
   }

   public function testHelpersLoading()
   {
      Zenplate::addHelper("string", new StringHelper());
      
      $html = Zenplate::load(__DIR__ . "/../fixture/tmpl_using_string_helper.php", array(
         "a" => "a"
      ));
      
      $this->assertEquals($html, "A");
   }
}
