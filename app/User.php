<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'provider', 'provider_id', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employerProfile()
    {
        return $this->hasOne(EmployerProfile::class);
    }

    public function employee()
    {
        return $this->hasOne(EmployeeProfile::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function companyGallery()
    {
        return $this->hasMany(EmployerGallery::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function appliedJobs()
    {
        return $this->hasMany(AppliedJob::class, 'employee_id');
    }
}
