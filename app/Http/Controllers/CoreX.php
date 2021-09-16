<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;

class CoreX extends Controller
{
    protected $rec;
    protected $send;
    protected $user_db;
    protected $Json;

    public function __construct()
    {
        $this->rec = new ReceiveMessage();
        $this->Json = new CreateJSON();
        $this->send = new SendMessage();
    }
    protected function Process()
    {
       $user_id = $this->rec->user();
       $this->send->go($this->Json->text($user_id,"Tin nhắn từ CoreX"));
    
    }
    protected function Image()
    {
        return error_log(request());
    }
}
