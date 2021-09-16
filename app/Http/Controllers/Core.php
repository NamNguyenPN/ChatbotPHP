<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;



class Core extends Controller
{
    protected $rec;
    protected $send;
    protected $user_db;
    protected $Json;
    protected $cache;

    public function __construct()
    {
        $this->rec = new ReceiveMessage();
    }

    protected function Chatbot()
    {
        $user_id=$this->rec->user_id();
        $this->cache = new CacheController($user_id);
        
        $status = $this->cache->user_status($user_id);

        // Người dùng mới //
        if($status === "new_user")
        {
            
        }

        // Người dùng cũ //
        if($status === "default")
        {

        }

        // Người dùng đang trong trạng thái //
        if($status === "")
        {

        }
    }

    protected function test()
    {
        Cache::remember("400",6000,function(){
            $value = [
                "status"=>"default",
                "question"=>[
                    ["A","B","C"],
                    ["H","G","F"],
                ]
                ];
            return $value;
        });
        return DB::table('kanjis')->where("kanji_id","1000")->first()['kanji'];
    }
}