<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'employees',
        'sector',
        'turn',
        'website',
        'vision',
        'description',
        'rfc',
        'business_name',
        'city_id',
        'main_recruiter',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'city_id' => 'integer',
    ];

    // public function user()
    // {
    //     return $this->morphOne(\App\Models\User::class, 'profile');
    // }


    public function main_recruiter(){
        return $this->belongsTo(Recruiter::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function recruiters(){
        return $this->hasMany(\App\Models\Recruiter::class);
    }

    public function logo()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function vacancies(){
        return $this->hasManyThrough(Vacancy::class,Recruiter::class);
    }
}
