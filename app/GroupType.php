<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupType extends Model
{
    protected $fillable = [
        'name', 'description', 'course_type_id'
    ];

    public function  groups(){
        return $this->hasMany(Group::class);
    }


    public function  courseType(){
        return $this->belongsTo(CourseType::class);
    }
}
