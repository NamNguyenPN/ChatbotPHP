<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Recaller;
use Illuminate\Http\Request;
use App\Http\Controllers\ReceiveMessage as ReceiveMessage;

class CoreSample extends Controller
{
    //**Khai báo mặc định**//(Muốn chỉnh sửa phải hỏi)
    protected $GetJson;
    protected $SendMessage;

    public function __construct(PreJson $PrJs, SendMessage $SeMe)
    {
        $this->GetJson = $PrJs;
        $this->SendMessage = $SeMe;
    }
    //********************//
    
    public function Process($ReceiveData)
    {
        

        //Code của bạn//

        $sender_id = $ReceiveData['entry'][0]['messaging'][0]['sender']['id'];

        $text="Chào bạn";        
        
        $response = $this->GetJson->MessageJSON($sender_id,$text);
        $url="https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.6435-9/117958532_976844066117437_5419867200041842242_n.jpg?_nc_cat=108&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=C9Ci7NNe3AkAX_zDDmy&_nc_ht=scontent.fsgn2-3.fna&oh=6f63d928dd8511a63b1e07d82f928ed8&oe=613FB77C";
        $response = $this->GetJson->AttachementJSON($sender_id,"image",$url);
        $this->SendMessage->Send($response);

        // $menu = $this->GetJson->MainMenuJSON($sender_id);
        
        // $this->SendMessage->SendMenu($menu);
        //----------//
    }
}
