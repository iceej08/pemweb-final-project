<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = ['username', 'mood', 'diary', 'photo', 'date_created'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
