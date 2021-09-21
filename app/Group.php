<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    protected $fillable = [
        'group_code', 'user_id', 'group_type_id', 'center_cost'
    ];


    public function students(){
        return $this->hasMany(Student::class);
    }


    public function users(){
        return $this->belongsToMany(User::class);
    }


    public function groupType(){
        return $this->belongsTo(GroupType::class);
    }

}
