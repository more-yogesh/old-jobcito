<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class EmployerProfile extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = [
        'user_id',
        'address1',
        'address2',
        'zipcode',
        'city_id',
        'total_employees',
        'average_salary',
        'overview',
        'services',
        'amenities',
        'job_open',
        'website',
        'contact',
        'contact_email',
        'established_date',
        'latitude',
        'longitude'
    ];

    protected $casts = [
        'established_date' => 'date|Y-m-d'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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

    public function jobs()
    {
        return $this->hasMany(Job::class, 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'employer_profiles_id');
    }

    public function averageRating(){
        $averageRating = 'no-ratings';
        if ($this->reviews->count() > 0) {
            $ratingSum = $this->reviews->sum('employee_rating');
            $total = $this->reviews->count();
            $averageRating = (int)$ratingSum / $total;
        }
        return $averageRating;
    }

    public function percentage() :int
    {
        $percentage = 0;
        $fields = auth()->user()->employerProfile;

        if ($fields->name){
            $percentage += 5;
        }
        if ($fields->address1){
            $percentage += 5;
        }
        if ($fields->zipcode){
            $percentage += 5;
        }
        if ($fields->city_id){
            $percentage += 15;
        }
        if ($fields->total_employees){
            $percentage += 10;
        }
        if ($fields->average_salary){
            $percentage += 10;
        }
        if ($fields->overview){
            $percentage += 15;
        }
        if ($fields->contact){
            $percentage += 10;
        }
        if ($fields->amenities){
            $percentage += 10;
        }
        if ($fields->services){
            $percentage += 15;
        }

        return $percentage;
    }

}
