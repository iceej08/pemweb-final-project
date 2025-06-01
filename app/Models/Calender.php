<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    protected $table = 'diary_data';
    protected $fillable = ['username', 'date_created', 'mood_rate'];
    public $timestamps = true;
}
