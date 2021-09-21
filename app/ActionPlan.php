<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ActionPlan extends Model
{
    protected $fillable = [
        'name', 'meeting_id'
    ];

    use SoftDeletes;

    public function meeting(){
        return $this->belongsTo(Meeting::class);
    }
}
