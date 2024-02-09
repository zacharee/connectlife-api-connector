<?php

namespace App\Http\Controllers;

use App\Services\ConnectlifeApiService;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ValidatesRequests;

    public function __construct(private ConnectlifeApiService $connectlifeApiService)
    {
    }

    public function updateDevice(string $deviceId, Request $request)
    {
        return response()->json(
            $this->connectlifeApiService->updateDevice($deviceId, $request->all())
        );
    }

    public function status(?string $deviceId = null)
    {
        return response()->json($this->connectlifeApiService->status($deviceId));
    }

    public function devices()
    {
        return response()->json($this->connectlifeApiService->devices());
    }
}