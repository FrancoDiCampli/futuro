<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'name',
        'last_name',
        'password',
        'tos',
        'notification',
        'title',
        'experience',
        'university',
        'graduated_at',
        'average',
        'speech',
        'available',
        'preference',
        'skils',
        'courses',
        'hobbies',
        'website',
        'birthdate',
        'avatar',
        'subcategory_id',
        'city_id',
        'job_id',
        'user_id',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tos' => 'boolean',
        'notification' => 'boolean',
        'graduated_at' => 'date',
        'average' => 'float',
        'birthdate' => 'date',
        'subcategory_id' => 'integer',
        'city_id' => 'integer',
        'job_id' => 'integer',
        'user_id' => 'integer',
    ];


    public function subcategory()
    {
        return $this->belongsTo(\App\Models\Subcategory::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function job()
    {
        return $this->belongsTo(\App\Models\Job::class);
    }

    public function profile()
    {
      return $this->morphTo();
    }

    public function filable(){
        return $this->morphTo();
    }
}
