<?php

use PHPUnit\Framework\TestCase;
use zenplate\helper\Shortener;

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

   public function testNullValue()
   {
      $shortened = $this->shortener->shorten(null, "/", 1);
      $this->assertEquals("", $shortened);
   }

   public function testShortening()
   {
      $shortened = $this->shortener->shorten($this->string, "/", 1);
      $this->assertEquals("a <a href='/' class='more'>...</a>", $shortened);
   }

   public function testShorteningWithFullSignature()
   {
      $shortened = $this->shortener->shorten($this->string, "/", 1, "more-css-klass", "the whole thing");
      $this->assertEquals("a <a href='/' class='more-css-klass'>the whole thing</a>", $shortened);
   }
}
