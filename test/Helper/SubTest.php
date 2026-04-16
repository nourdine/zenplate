<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zenplate\Zenplate;

class SubTest extends TestCase
{
   public function testSubTmplInclusion()
   {
      $html = Zenplate::load(__DIR__ . "/../_fixture/tmpl_including_sub.php", [
         "greet" => "hello"
      ]);

      $this->assertEquals($html, "includer: hello\nincluded: hello");
   }

   public function testScopeSegregation()
   {
      $html = Zenplate::load(__DIR__ . "/../_fixture/non_passing_tmpl_including_sub.php", [
         "a" => 1
      ]);

      $this->assertEquals($html, "includer: 1\nincluded: \$a is not set");
   }
}
