<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaryData extends Model
{
    protected $table = 'diary_data';
    protected $fillable = ['username', 'diary', 'date_created', 'mood_rate'];
    
}
