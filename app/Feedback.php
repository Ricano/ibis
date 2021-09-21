<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    protected $fillable = [
        'meeting_student_id', 'meeting_user_id', 'description'
    ];

    use SoftDeletes;

    public function student(){
        return $this->belongsTo(MeetingStudent::class);
    }

    public function user(){
        return $this->belongsTo(MeetingUser::class);
    }
}
