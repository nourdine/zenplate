<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zenplate\Helper\Time;

class TimeTest extends TestCase
{
   private $timeHelper;
   private $now = 1618481004;

   public function setUp(): void
   {
      Time::setTheNow($this->now);
      $this->timeHelper = new Time();
   }

   public function tearDown(): void
   {
      $this->timeHelper = null;
   }

   public function test1SecondAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 1), "1 second ago");
   }

   public function test2SecondsAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 2), "2 seconds ago");
   }

   public function test59SecondsAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 59), "59 seconds ago");
   }

   public function testOneMinuteAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 60), "1 minute ago");
   }

   public function testRightAboveOneMinuteAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 61), "1 minute ago");
   }

   // fail
   public function testRightUnder2MinutesAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 119), "1 minute ago");
   }

   public function test2MinutesAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 120), "2 minutes ago");
   }

   public function testRightAbove2MinutesAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 121), "2 minutes ago");
   }

   public function testRightUnder1HourAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 3599), "59 minutes ago");
   }

   public function test1HourAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 3600), "1 hour ago");
   }

   public function testRightAbove1HourAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 3601), "1 hour ago");
   }

   public function testRightUnder2HoursAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 7119), "1 hour ago");
   }

   public function test2HoursAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 7200), "2 hours ago");
   }

   public function testRightAbove2HoursAgo()
   {
      $this->assertEquals($this->timeHelper->ago($this->now - 7201), "2 hours ago");
   }
}
