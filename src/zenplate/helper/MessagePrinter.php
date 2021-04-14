<?php

namespace zenplate\helper;

use zenplate\helper\Helper;

class MessagePrinter extends Helper {

   private function getCssKlass($type) {
      if ($type === "s") {
         return "success";
      } else if ($type === "w") {
         return "warning";
      } else if ($type === "f") {
         return "failure";
      } else {
         throw new \RuntimeException("Unknown message type [" . $type . "]");
      }
   }

   public function __construct() {
      
   }

   /**
    * @param string $message the message to display
    * @param string $type s|f|w namely success, failure and warning
    * @param boolean $transient Shall the message be transient?
    * @return string
    */
   public function html($message, $type, $transient = false) {
      $typeCssKlass = $this->getCssKlass($type);
      $transientCssKlass = $transient ? "transient" : "";
      return "<div class='ui-message {$typeCssKlass} {$transientCssKlass}'>{$message}</div>";
   }
}
