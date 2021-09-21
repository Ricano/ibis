<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeetingType extends Model
{
    protected $fillable = [
        'name', 'standard_text'
    ];

    use SoftDeletes;

    public function meetings(){
        return $this->hasMany(Meeting::class);
    }
}
