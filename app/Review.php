<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'employee_profiles_id',
        'employer_profiles_id',
        'employee_message',
        'employee_title',
        'employer_message',
        'employer_title',
        'employee_rating',
        'employer_rating',
        'report'
    ];

    public function employeeProfile()
    {
        return $this->belongsTo(EmployeeProfile::class, 'employee_profiles_id');
    }

    public function employerProfile()
    {
        return $this->belongsTo(EmployerProfile::class, 'employer_profiles_id');
    }
}
