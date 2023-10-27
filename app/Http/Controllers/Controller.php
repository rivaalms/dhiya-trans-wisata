<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Casts\Json;
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

   /**
    * Sends API Response as JSON
    * @param Array|Object $data
    * @param Number $status
    * @return Illuminate\Http\Response
    */
   public function apiResponse($data, $status = 200) {
      return response()->json($data, $status);
   }

   public function jsonify($data) {
      return Json::decode(Json::encode($data));
   }

   public function lastArrayItem(Array $array) {
      return end($array);
   }
}
