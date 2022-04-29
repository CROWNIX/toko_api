<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController{
    protected function responseHasil($code, $status, $data){
        return \response()->json([
            "code" => $code,
            "status" => $status,
            "data" => $data
        ]);
    }
}