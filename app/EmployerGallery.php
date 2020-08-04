<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class EmployerGallery extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'title',
        'description'
    ];
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);

        $this->addMediaConversion('preview')
            ->width(1024)
            ->height(768)
            ->sharpen(10);
    }

    public function employer()
    {
        return $this->belongsTo(User::class);
    }
}
