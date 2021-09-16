<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;
    protected $connection ='mongodb';
    protected $table = 'counters';
    protected $primaryKey = 'table_name';
    protected $fillable=['table_name','data_counter'];
}
