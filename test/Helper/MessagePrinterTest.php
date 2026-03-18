<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zenplate\Helper\MessagePrinter;

class MessagePrinterTest extends TestCase
{
   private $printer;

   public function setUp(): void
   {
      $this->printer = new MessagePrinter();
   }

   public function tearDown(): void
   {
      $this->printer = null;
   }

   public function testPrintingOfASuccessMessage()
   {
      $this->assertEquals("<div class='zenplate-ui-message success static'>message</div>", $this->printer->print("message", "s"));
   }

   public function testPrintingOfAWarningMessage()
   {
      $this->assertEquals("<div class='zenplate-ui-message warning static'>message</div>", $this->printer->print("message", "w"));
   }

   public function testPrintingOfAnFailureMessage()
   {
      $this->assertEquals("<div class='zenplate-ui-message failure static'>message</div>", $this->printer->print("message", "f"));
   }

   public function testPrintingOfASuccessTransientMessage()
   {
      $this->assertEquals("<div class='zenplate-ui-message success transient'>message</div>", $this->printer->print("message", "s", true));
   }

   public function testPrintingOfAWarningTransientMessage()
   {
      $this->assertEquals("<div class='zenplate-ui-message warning transient'>message</div>", $this->printer->print("message", "w", true));
   }

   public function testPrintingOfAnFailureTransientMessage()
   {
      $this->assertEquals("<div class='zenplate-ui-message failure transient'>message</div>", $this->printer->print("message", "f", true));
   }

   public function testPrintingOfAnUnknownMessageType()
   {
      $this->expectException(RuntimeException::class);
      $this->printer->print("message", "NOT");
   }
}
