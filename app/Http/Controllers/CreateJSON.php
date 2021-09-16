<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateJSON extends Controller
{
    public function text($id,$text)
    {
        $json = '{
            "recipient":{
                "id":"'.$id.'"
            },
            "message":{
                "text": "'.$text.'"
            }
        }';
        return $json;
    }
    public function attachement($id,$type,$url)
    {
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
}
