<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class SendMessage extends Controller
{
    public function go($response)
    {
        $url='https://graph.facebook.com/v12.0/me/messages?access_token='.env('PAGE_ACCESS_TOKEN');
        $res = Http::post($url,json_decode($response,true));
        error_log("Status: ".$res->status());
    }
    public function menu($response)
    {
        $url='https://graph.facebook.com/v12.0/me/messenger_profile?access_token='.env('PAGE_ACCESS_TOKEN');
        $res = Http::post($url,json_decode($response,true));
        error_log("Status: ".$res->status());
    }
}
