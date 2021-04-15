<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use zenplate\helper\Time;

class TimeTest extends TestCase
{

   /**
    * @var Time 
    */
   private $timeHelper;

   public function setUp(): void
   {
      Time::setTheNow(1618481004);
      $this->timeHelper = new Time();
   }

   public function tearDown(): void
   {
      $this->timeHelper = null;
   }

   public function testSecondAgo()
   {
      $this->assertEquals($this->timeHelper->ago(1618481003), "1 second ago");
   }

   public function testSecondsAgo()
   {
      $this->assertEquals($this->timeHelper->ago(1618481002), "2 seconds ago");
   }

   public function testMinuteAgo()
   {
      $this->assertEquals($this->timeHelper->ago(1618480944), "1 minute ago");
   }

   public function testMinutesAgo()
   {
      $this->assertEquals($this->timeHelper->ago(1618480904), "2 minutes ago");
   }
}
