<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JwtDecoderHelper;

class DecodeController extends Controller
{
    public function index()
    {
        $token=request()->bearerToken();
        $temp=JwtDecoderHelper::decode($token);
        dd($temp);
        return $temp;
    }
}
