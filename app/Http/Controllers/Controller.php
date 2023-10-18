<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
   use AuthorizesRequests, ValidatesRequests;

   /**
    * Generate slug from text input
    * @param String $text
    * @return String
    */
   public function generateSlug(String $text)
   {
      $text = preg_replace('/[^A-Za-z0-9]+/', ' ', $text);
      $text = strtolower(trim($text));

      $slug = str_replace(' ', '-', $text);
      return $slug;
   }
}
