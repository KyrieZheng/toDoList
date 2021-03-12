<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($msg = '', $code = 200, $data = [])
    {
        $data = [
            'msg' => $msg,
            'code' => $code,
            'data' => $data
        ];
        return response()->json($data);
    }

    public function error($msg, $code = 10010, $data = [])
    {
        $data = [
            'msg' => $msg,
            'code' => $code,
            'data' => $data
        ];
        return response()->json($data);
    }
}
