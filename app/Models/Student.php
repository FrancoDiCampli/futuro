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
        'first_name',
        'last_name',
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
        'skills',
        'courses',
        'hobbies',
        'website',
        'birthdate',
        'subcategory_id',
        'city_id',
        'completed'
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
        'skills'   => 'array',
    ];

    public $appends = ['percentage'];

    public function subcategory()
    {
        return $this->belongsTo(\App\Models\Subcategory::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function user()
    {
        return $this->morphOne(\App\Models\User::class, 'profile');
    }

    // public function avatar()
    // {
    //     return $this->morphOne(File::class, 'fileable');
    // }

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class,'postulations')->withPivot(['status','visible'])->withTimestamps();
    }

    public function languages(){
        return $this->belongsToMany(Language::class)->withPivot('level');
    }
    public function softwares(){
        return $this->belongsToMany(Software::class)->withPivot('level');
    }

    public function experiences(){
        return $this->hasMany(Experience::class);
    }

    public function getPercentageAttribute(){

        // $com = json_decode($this->completed);

        // return $total = intval($com->personal) + intval($com->education);

        // return round(($total/20) * 100,2);
    }
}
