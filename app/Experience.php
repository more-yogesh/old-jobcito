<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'from_date',
        'to_date',
        'salary',
        'designation',
        'salary_sleep',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    protected $casts = [
        'created_at' => 'datetime',
    ];
}
