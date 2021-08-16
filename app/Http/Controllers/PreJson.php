<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreJson extends Controller
{
    //Gửi text
    public function MessageJSON($id,$text){
        $json='{
            "recipient": {
                "id": "'.$id.'"
            },
            "message": {
                "text": "'.$text.'"
                }
        }';
        return $json;
    }
    //Gửi nội dung audio, image, video
    public function AttachementJSON($id,$type,$url)  {
        $json='{
            "recipient": {
                "id": "'.$id.'"
            },
            "message":{
                "attachment":{
                    "type":"'.$type.'", 
                    "payload":{
                        "url":"'.$url.'", 
                        "is_reusable":true
                    }
                }
            }
        }';
        return $json;
    }
    //Menu chính (có thể viết Menu cho việc học dựa trên cấu trúc này)
    public function MainMenuJSON($id){
        $json='{
            "psid": "'.$id.'",
            "persistent_menu": [
                {
                    "locale": "default",
                    "composer_input_disabled": false,
                    "call_to_actions": [
                        {
                            "type": "postback",
                            "title": "Nói chuyện với Admin",
                            "payload": "Talk with Admin"
                        },
                        {
                            "type": "postback",
                            "title": "Học tiếng Nhật",
                            "payload": "Learn Japanese"
                        },
                        {
                            "type": "postback",
                            "title": "Kết thúc",
                            "payload": "End chat"
                        }
                    ]
                }
            ]
        }';
        return $json;
    }
    // Code của bạn //


    
    //-------------//
}
