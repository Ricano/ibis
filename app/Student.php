<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    protected $fillable = [
        'name', 'student_number', 'group_id'
    ];

    public function meetings(){
        return $this->belongsToMany(Meeting::class);
    }


    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function  planos(){
        return $this->hasMany(Plano::class);
    }
}
