<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendMessage extends Controller
{
    public function Send($response)
    {
        $url='https://graph.facebook.com/v11.0/me/messages?access_token='.env('PAGE_ACCESS_TOKEN');
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$response);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
    }
    public function SendMenu($response)
    {
        $url='https://graph.facebook.com/v11.0/me/messenger_profile?access_token='.env('PAGE_ACCESS_TOKEN');
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$response);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
