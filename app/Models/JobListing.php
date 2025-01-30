<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'experience',
        'salary',
        'extra_info',
        'company_name',
        'company_logo',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
