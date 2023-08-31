<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function sendSuccess($res, $msg)
    {
        $response = [
            'success' => true,
            'data' => $res,
            'message' => $msg
        ];
        return response()->json($response, 200);
    }

    public function sendError($err, $errMsg = [], $code = 404)
    {
        $response = [
            'success' => FALSE,
            'error' => $err,
        ];
        if (!empty($errMsg)) {
            $response['data'] = $errMsg;
        }
        return response()->json($response, $code);
    }
}
