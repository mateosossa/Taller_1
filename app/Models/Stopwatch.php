<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stopwatch extends Model
{
    protected $fillable = ['started_at', 'paused_at', 'running'];
    
    protected $dates = ['started_at', 'paused_at'];
}
