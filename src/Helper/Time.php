<?php

declare(strict_types=1);

namespace Zenplate\Helper;

use Zenplate\Helper\Helper;

class Time extends Helper
{
   private static $now = null;

   /**
    * Returns a string describing how long ago the provided timestamp was.
    *
    * @param int $time The timestamp
    *
    * @return string
    */
   public function ago(int $timestamp): string
   {
      $now = self::$now !== null ? self::$now : time();
      $elapsedSeconds = $now - $timestamp;
      $out = '0 seconds';

      if ($elapsedSeconds >= 1) {

         $secondsPerUnitOfTime = array(
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
         );

         foreach ($secondsPerUnitOfTime as $seconds => $unit) {
            $ratio = $elapsedSeconds / $seconds;
            if ($ratio >= 1) {
               $val = floor($ratio);
               $out =  $val . ' ' . $unit . ($val > 1 ? 's' : '') . ' ago';
               break;
            }
         }
      }

      return $out;
   }

   /**
    * Returns a string describing the provided timestamp fromatted as requestied.
    *
    * @param int $time The timestamp
    * @param string $format The format to use for formatting the timestamp
    *
    * @return string
    */
   public function format(int $time, string $format = "F Y")
   {
      return date($format, $time);
   }

   /**
    * Meant to be used for testing purposes ONLY
    */
   public static function setTheNow(int $timestamp)
   {
      self::$now = $timestamp;
   }
}
