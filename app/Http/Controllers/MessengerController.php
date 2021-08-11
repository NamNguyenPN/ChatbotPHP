<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessengerController extends Controller
{
    //
    public function index()
    {
        $this->verifyAccess();

        $input = json_decode(file_get_contents("php://input"),true);
        $id      = $input['entry'][0]['messaging'][0]['sender']['id'];
        $message = $input['entry'][0]['messaging'][0]['message']['text'];

        $response = [
            'messaging_type'=>"RESPONSE",
            'recipient' => ['id' => $id],
            'message' => ['text' => 'Hello World! :)']
        ];
        $this->sendMessage($response);

    }
    protected function sendMessage($response)
    {
        $ch = curl_init('https://graph.facebook.com/v11.0/me/messages?access_token=' . env('PAGE_ACCESS_TOKEN'));
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($response));
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        curl_exec($ch);
        curl_close($ch);
    }
    protected function verifyAccess()
    {
        $local_token = env("FACEBOOK_MESSENGER_WEBHOOK_TOKEN");
        $hub_verify_token = request('hub_verify_token');

        if($hub_verify_token === $local_token){
            echo request('hub_challenge');
            exit;
        }
    }
}
