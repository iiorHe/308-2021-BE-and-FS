<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'year', 'title', 'genre', 'engine', 'platform', 'dev_id',
    ];
    public function dev()
    {
        return $this->belongsTo(
            Dev::class,
                'dev_id',
                'id'
        );
    }
}
