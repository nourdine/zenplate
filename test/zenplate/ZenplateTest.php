<?php

use PHPUnit\Framework\TestCase;
use zenplate\Zenplate;

class ZenplateTest extends TestCase {

   public function setUp() {
      
   }

   public function tearDown() {
      
   }

   public function testVarsResolution() {
      $html = Zenplate::load(__DIR__ . "/../fixture/tmpl.php", array(
            "a" => 1,
            "b" => 2,
            "c" => 3
         ));
      $this->assertEquals($html, "123");
   }

   public function testHelpersUsage() {
      Zenplate::addViewHelper("string", new StringHelper());
      $html = Zenplate::load(__DIR__ . "/../fixture/tmpl_using_helpers.php", array(
            "a" => "a"
         ));
      $this->assertEquals($html, "A");
   }
}