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
        
        $this->SendMessage->Send($response);

        // $menu = $this->GetJson->MainMenuJSON($sender_id);
        
        // $this->SendMessage->SendMenu($menu);
        //----------//
    }
}
