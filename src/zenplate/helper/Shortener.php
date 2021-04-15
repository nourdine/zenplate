<?php

namespace zenplate\helper;

use zenplate\helper\Helper;

class Shortener extends Helper
{

   const WHITESPACE = " ";

   /**
    * Shortens a string and add an <a> element pointing to a URL containing the whole content.
    *
    * @param string $string The text to shorten
    * @param string $link The URL containing the full resource
    * @param int $max The max number of the words to display before the <a> element pointing to the $link
    * @param string $moreLinkCssKlass The css class to use for the <a> element pointing to the $link
    * @param string $moreLinkText The text to use for the <a> element pointing to the $link 
    *
    * @return string
    */
   public function shorten($string, $link, $max = 20, $moreLinkCssKlass = "more", $moreLinkText = "...")
   {
      $words = preg_split("/[\s]+/", $string);
      if (count($words) > $max) {
         $less = array_slice($words, 0, $max);
         return implode(self::WHITESPACE, $less) . self::WHITESPACE . $this->createMoreLinkHTML($link, $moreLinkCssKlass, $moreLinkText);
      }
      return $string;
   }

   protected function createMoreLinkHTML($link, $cssKlass, $txt)
   {
      return "<a href='{$link}' class='{$cssKlass}'>{$txt}</a>";
   }
}
