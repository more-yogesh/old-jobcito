<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type'
    ];

    public function jobType()
    {
        return $this->hasMany(Job::class);
    }
}
