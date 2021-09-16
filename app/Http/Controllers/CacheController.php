<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;


class CacheController extends Controller
{
    protected $user_db;
    protected $cache;
    protected $table = "mess_user";

    public function __construct($user_id)
    {
        if(!Cache::has($user_id))
        {
            if(DB::table($this->table)->where('user_id',$user_id)->count('*')==0)
            {
                DB::table($this->table)->insert(
                    [
                        'user_id'=>$user_id,
                        'username'=>'',
                        'status'=>'new_user', //Trạng thái người dùng (new_user/default)
                        'level'=>'', //Trình độ tiếng Nhật (N5/N4/N3)
                        
                ]);
            }
        }
    }
    public function exist_user($user_id)
    {
        if(!Cache::has($user_id))
        {
            return false;
        }
        return true;
    }
    public function user_status($user_id)
    {
        if(!Cache::has($user_id))
        {
            return DB::table($this->table)
            ->where("user_id",$user_id)->get()['status'];
        }
        return Cache::get($user_id)["status"];
    }
}
