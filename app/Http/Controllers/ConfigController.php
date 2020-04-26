<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
   public function getConfig() {
       return response()->json([
           'delivery_cost' => Config::DELIVERY_COSTS,
       ]);
   }
}
