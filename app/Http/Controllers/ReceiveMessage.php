<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiveMessage extends Controller
{
    protected $variable = 1;
    public function GetMessage(){
        $this->verifyAccess();

        $receive_data = json_decode(file_get_contents("php://input"),true);
        
        return $this->RouteMessage($receive_data);
    }
    protected function RouteMessage($receive_data){
        if(in_array("postback",array_keys($receive_data['entry'][0]['messaging'][0]))){

            return ["postback",$receive_data];
        }
        if(in_array("message",array_keys($receive_data['entry'][0]['messaging'][0]))){
            
            return ["message",$receive_data];
        }
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
