<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'year', 'title', 'genre', 'devs', 'engine_id', 'platform',
    ];
    public function engine(){
        return $this->belongsTo(
            Engine::class,
            'engine_id',
            'id'
        );
    }
}
