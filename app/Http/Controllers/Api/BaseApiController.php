<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    protected function success($data,$message,$code){
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ],$code);
    }

    protected function error($message){
        return response()->json([
            'success' => false,
            'message' => $message
        ]);
    }

    protected function formatMany($data,$resource){
        $formatData = [];
        foreach($data as $item)
        {
            $formatData[] = $resource::transfomer($item);
        }
        return $formatData;
    }
}
