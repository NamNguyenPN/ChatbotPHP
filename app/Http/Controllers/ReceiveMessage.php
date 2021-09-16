<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiveMessage extends Controller
{
    protected $id;

    protected $type_mess;

    protected $user_data;

    protected $receive_data;

    public function __construct()
    {
        $this->receive_data = json_decode(file_get_contents("php://input"),true);       
    }

    public function verifyAccess()
    {
        $local_token = env("FACEBOOK_MESSENGER_WEBHOOK_TOKEN");
        $hub_verify_token = request('hub_verify_token');
        if($hub_verify_token === $local_token){
            echo request('hub_challenge');
            exit;
        }
    }

    public function user_id()
    {
        $this->id = $this->receive_data['entry'][0]['messaging'][0]['sender']['id'];
        return $this->id;
    }

    public function type_message()
    {
        $arr = $this->receive_data['entry'][0]['messaging'][0];
        if(array_key_exists('message',$arr))
        {
            $this->type_mess = 'message';
            return $this->type_mess;
        }
    }
    public function message_data()
    {
        return $this->receive_data['entry'][0]['messaging'][$this->type()];
    }

    public function all_data()
    {
        return [$this->user_id(),$this->type_message(),$this->message_data()];
    }
}
