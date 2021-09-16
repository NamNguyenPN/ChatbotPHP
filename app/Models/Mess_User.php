<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Mess_User extends Model
{
    protected $connection ='mongodb';
    protected $table = 'mess_users';
    protected $primaryKey = 'user_id';
}
