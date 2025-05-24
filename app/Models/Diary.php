<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diary extends Model
{
    use HasFactory;

    protected $table = "diary_data";
    protected $fillable = ['username', 'mood', 'mood_rate', 'diary', 'photo', 'date_created'];

    public function user(){ 
        return $this->belongsTo(User::class);
    }
}
