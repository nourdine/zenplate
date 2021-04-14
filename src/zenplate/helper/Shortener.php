<?php

namespace zenplate\helper;

use zenplate\helper\Helper;

class Shortener extends Helper {

   const WS = " ";

   protected function createMoreLinkHTML($link, $cssKlass, $txt) {
      return "<a href='{$link}' class='{$cssKlass}'>{$txt}</a>";
   }

   public function shorten($string, $link, $max = 20, $moreLinkCssKlass = "more", $moreLinkText = "...") {
      $words = preg_split("/[\s]+/", $string);
      if (count($words) > $max) {
         $less = array_slice($words, 0, $max);
         return implode(self::WS, $less) . self::WS . $this->createMoreLinkHTML($link, $moreLinkCssKlass, $moreLinkText);
      }
      return $string;
   }
}