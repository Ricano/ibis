<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ufcd extends Model
{
    protected $fillable = [
        'name', 'number'
    ];

    public function ata(){
        return $this->hasMany(Ata::class);
    }
}
