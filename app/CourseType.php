<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    protected $fillable = [
        'name', 'acronym'
    ];

    public function groupType(){
        return $this->hasMany(GroupType::class);
    }
}
