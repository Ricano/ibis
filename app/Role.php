<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    use SoftDeletes;

    public function users(){
        return $this->hasMany(User::class);
    }
}
