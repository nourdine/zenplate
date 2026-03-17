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

   public function testPrintingOfASucccessTransientMessage()
   {
      $this->assertEquals("<div class='zenplate-ui-message success transient'>ok</div>", $this->printer->print("ok", "s", true));
   }

   public function testPrintingOfAnUnknownMessageType()
   {
      $this->expectException(RuntimeException::class);
      $this->printer->print("message", "NOT");
   }
}
