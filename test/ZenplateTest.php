<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zenplate\Zenplate;

include_once(__DIR__ . "/_fixture/StringHelper.php");

class ZenplateTest extends TestCase
{
   public function testVariablesResolution()
   {
      $html = Zenplate::load(__DIR__ . "/_fixture/tmpl_1.php", [
         "a" => 1,
         "b" => 2,
         "c" => 3
      ]);

      $this->assertEquals($html, "123");
   }

   public function testScopeSegregation()
   {
      Zenplate::load(__DIR__ . "/_fixture/tmpl_1.php", [
         "a" => 1,
         "b" => 2,
         "c" => 3
      ]);

      $html = Zenplate::load(__DIR__ . "/_fixture/tmpl_2.php", [
         "greet" => "hello"
      ]);

      $this->assertEquals($html, "\$a is not set");
   }

   public function testHelpersLoading()
   {
      Zenplate::addHelper("string", new StringHelper());

      $html = Zenplate::load(__DIR__ . "/_fixture/tmpl_using_string_helper.php", array(
         "a" => "a"
      ));

      $this->assertEquals($html, "A");
   }
}
