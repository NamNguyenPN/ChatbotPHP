<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Kanji extends Model
{
    protected $connection ='mongodb';
    protected $table = 'kanjis';
    protected $primaryKey = 'kanji_id';
}
