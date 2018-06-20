<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $request,$repos;
    public function __construct(Request $_request,$_repos=null)
    {
//        $this->request = app('request');
        $this->repos = $_repos;
        $this->request = $_request;
    }

    public function respondForward($response)
    {
        return $this->respond($response['message'] ?? "", $response['status'], $response['data'] ?? null,  $response['statusCode'] ?? null, $response['headers'] ?? []);
    }

    public function respond($message = "", $status=false, $data = null,  $statusCode = null, $headers = [])
    {
        if ($statusCode === null)
            $statusCode = 200;
        $return = [];
        $return['status'] = $status;
        $return['data'] = $data;
        $return['message'] = $message;
        return response()->json($return, $statusCode, $headers);
    }
}
