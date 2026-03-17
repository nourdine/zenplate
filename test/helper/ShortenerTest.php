<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zenplate\Helper\Shortener;

class ShortenerTest extends TestCase
{
   /**
    * @var Shortener 
    */
   private $shortener;

   private $string = "a b c d e f g h i l";

   public function setUp(): void
   {
      $this->shortener = new Shortener();
   }

   public function tearDown(): void
   {
      $this->shortener = null;
   }

   public function testEmptyString()
   {
      $shortened = $this->shortener->shorten("", "/", 1);
      $this->assertEquals("", $shortened);
   }

   public function testShortening()
   {
      $shortened = $this->shortener->shorten($this->string, "/", 1);
      $this->assertEquals("a <a href='/' class='more'>...</a>", $shortened);
   }

   public function testShorteningWithFullSignature()
   {
      $shortened = $this->shortener->shorten($this->string, "/wherever", 1, "more-css-klass", "the whole thing");
      $this->assertEquals("a <a href='/wherever' class='more-css-klass'>the whole thing</a>", $shortened);
   }
}
