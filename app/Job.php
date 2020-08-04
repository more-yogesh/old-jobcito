<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\HasTags;


class Job extends Model implements HasMedia
{
    use HasMediaTrait, SoftDeletes, Categorizable, HasTags;

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);

        $this->addMediaConversion('square')
            ->width(412)
            ->height(412)
            ->sharpen(10);
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employerProfile()
    {
        return $this->hasOneThrough(EmployerProfile::class, User::class, 'id', 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function appliedJobs()
    {
        return $this->hasMany(AppliedJob::class, 'job_id');
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'type');
    }
}
