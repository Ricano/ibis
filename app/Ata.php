<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ata extends Model
{
    protected $fillable = [
        'data', 'plano_atividades','anexos','meeting_id', 'ufcd_id'
    ];

    public function  meeting(){
        return $this->belongsTo(Meeting::class);
    }

    public function  planos(){
        return $this->hasMany(Plano::class);
    }


    public function ufcd(){
        return $this->belongsTo(Ufcd::class);
    }
}
