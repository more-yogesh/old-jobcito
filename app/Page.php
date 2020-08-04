<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable =[
        'title',
        'meta_description',
        'meta_keywords',
        'content',
        'status'
    ];


    public function setTitleAttribute($value){
        $this->attributes['title']=str_slug($value);
    }


}
