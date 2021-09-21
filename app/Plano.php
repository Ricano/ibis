<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = [
        'ata_id','meeting_student_id' ,'action', 'intervenientes','medicao'
    ];

    public function  ata(){
        return $this->belongsTo(Ata::class);
    }
    public function  student(){
        return $this->belongsTo(Student::class);
    }
}
