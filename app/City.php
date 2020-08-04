<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'cities';
    protected $fillable = ['city_name'];

    public function employer()
    {
        return $this->hasMany(EmployerProfile::class);
    }

    public function jobs()
    {
        return $this->hasMany(City::class);
    }
}
