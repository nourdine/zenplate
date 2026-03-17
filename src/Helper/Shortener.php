<?php

declare(strict_types=1);

namespace Zenplate\Helper;

use Zenplate\Helper\Helper;

class Shortener extends Helper
{
   const WHITESPACE = " ";

   /**
    * Shorten a string and add an <a> element pointing to a URL containing the whole content.
    *
    * @param string $string The text to shorten
    * @param string $link The URL containing the full resource
    * @param int $max The max number of words to display before the <a> pointing to the $link
    * @param string $moreLinkCssKlass The css class to use for the <a> element pointing to $link
    * @param string $moreLinkText The text to use for the <a> element pointing to $link 
    *
    * @return string
    */
   public function shorten(
      string $string,
      string $link,
      int $max = 20,
      string $moreLinkCssKlass = "more",
      string $moreLinkText = "..."
   ): string {

   $out = $string ? $string : "";
      $words = preg_split("/[\s]+/", $string);
      if (count($words) > $max) {
         $less = array_slice($words, 0, $max);
         $out = implode(self::WHITESPACE, $less) . self::WHITESPACE . $this->createMoreLinkHTML($link, $moreLinkCssKlass, $moreLinkText);
      }
      return $out;
   }

   protected function createMoreLinkHTML(string $link, string $cssKlass, string $txt): string
   {
      return "<a href='{$link}' class='{$cssKlass}'>{$txt}</a>";
   }
}
