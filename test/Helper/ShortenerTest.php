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

   public function testShorteningAfter1Word()
   {
      $shortened = $this->shortener->shorten($this->string, "/", 1);
      $this->assertEquals("a <a href='/' class='more'>...</a>", $shortened);
   }

   public function testShorteningAfter2Words()
   {
      $shortened = $this->shortener->shorten($this->string, "/", 2);
      $this->assertEquals("a b <a href='/' class='more'>...</a>", $shortened);
   }

   public function testShorteningUsingRightBelowMax()
   {
      $shortened = $this->shortener->shorten($this->string, "/", 9);
      $this->assertEquals("a b c d e f g h i <a href='/' class='more'>...</a>", $shortened);
   }

   public function testShorteningUsingMax()
   {
      $shortened = $this->shortener->shorten($this->string, "/", 10);
      $this->assertEquals("{$this->string}", $shortened);
   }

   public function testShorteningAfterMoreThanAvailable()
   {
      $shortened = $this->shortener->shorten($this->string, "/", 11);
      $this->assertEquals("{$this->string}", $shortened);
   }

   public function testShorteningWithFullSignature()
   {
      $shortened = $this->shortener->shorten($this->string, "/wherever", 3, "more-css-klass", "see the whole thing");
      $this->assertEquals("a b c <a href='/wherever' class='more-css-klass'>see the whole thing</a>", $shortened);
   }
}
