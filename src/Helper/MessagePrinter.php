<?php

declare(strict_types=1);

namespace Zenplate\Helper;

use RuntimeException;
use Zenplate\Helper\Helper;

class MessagePrinter extends Helper
{
   /**
    * Prints an element containing a success, failure or warning message.
    *
    * @param string $message The message to display
    * @param string $type s|f|w Namely success, failure and warning. An extra css class will be added accordingly
    * @param boolean $transient Whether the message be transient. An extra css class will be added accordingly
    *
    * @throws RuntimeException
    * @return string
    */
   public function print($message, $type, $transient = false): string
   {
      $typeCssKlass = $this->getCssKlass($type);
      $transientCssKlass = $transient ? "transient" : "";
      return "<div class='zenplate-ui-message {$typeCssKlass} {$transientCssKlass}'>{$message}</div>";
   }

   private function getCssKlass($type): string
   {
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
}
