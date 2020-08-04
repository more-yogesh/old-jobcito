<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class EmployeeProfile extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    protected $fillable = [
        'user_id',
        'city_id',
        'name',
        'dob',
        'contact',
    ];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function employeeReview()
    {
        return $this->hasMany(Review::class, 'employee_profiles_id');
    }
    public function percentage() :int
    {
        $percentage = 0;
        $fields = auth()->user()->employee;

        if ($fields->city_id){
            $percentage += 15;
        }
        if ($fields->name){
            $percentage += 15;
        }
        if ($fields->title){
            $percentage += 15;
        }
        if ($fields->zipcode){
            $percentage += 15;
        }
        if ($fields->overview){
            $percentage += 20;
        }
        if ($fields->contact){
            $percentage += 20;
        }
        return $percentage;
    }
}
