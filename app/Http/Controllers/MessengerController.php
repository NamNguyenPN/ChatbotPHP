<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessengerController extends Controller
{
    //
    public function index()
    {
        $this->verifyAccess();
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $input = json_decode(file_get_contents("php://input"),true);
        $id      = $input['entry'][0]['messaging'][0]['sender']['id'];
        $message = $input['entry'][0]['messaging'][0]['message']['text'];
        $out->writeln("ID người gửi: ".$id);
        $out->writeln("Tin nhắn đã nhận: ".$message);
        $jsondata='{
            "recipient": {
                "id": "'.$id.'"
            },
            "message": {
                "text": "Tin nhắn tự động: Chào mừng tới CLB Wakame <3"
                }
        }';
        $jsonimage='{
            "recipient": {
                "id": "'.$id.'"
            },
            "message":{
                "attachment":{
                    "type":"image", 
                    "payload":{
                        "url":"https://scontent.fsgn2-6.fna.fbcdn.net/v/t1.6435-9/161403561_188173223113809_3264972539783933857_n.jpg?_nc_cat=111&ccb=1-4&_nc_sid=09cbfe&_nc_ohc=fRq3LrATeOEAX_6f_Ci&_nc_ht=scontent.fsgn2-6.fna&oh=a28a1132012d3f0caac90fd0c0827967&oe=613AB515", 
                        "is_reusable":true
                    }
                }
            }
        }';
        $this->sendMessage($jsondata);

    }
    protected function sendMessage($response)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $url='https://graph.facebook.com/v11.0/me/messages?access_token='.env('PAGE_ACCESS_TOKEN');
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$response);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
        $out->writeln("Nội dung tin nhắn sẽ được gửi: ");
        $out->writeln($response);
        $out->writeln("-----------------------------------");
        // $out->writeln("POST SEND: ".$ch);
        $result = curl_exec($ch);
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
