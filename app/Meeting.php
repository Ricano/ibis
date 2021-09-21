<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Meeting extends Model
{
    use Notifiable;

    protected $fillable = [
        'start', 'end', 'coordinator_intro', 'ata', 'meeting_type'
    ];

    use SoftDeletes;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class);
    }

    public function actionPlans(){
        return $this->hasMany(ActionPlan::class);
    }
    public function ata(){
        return $this->hasMany(Ata::class);
    }

    public function meetingType(){
        return $this->belongsTo(MeetingType::class);
    }
}
