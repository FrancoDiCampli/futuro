<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
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
        'phone',
        'belong_enterprise',
        'enterprise_id',
        'city_id',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                => 'integer',
        'city_id'           => 'integer',
        'belong_enterprise' => 'boolean',
    ];

    const STATUS = [
        0   => 'disabled',
        1   => 'enabled',
        2   => 'suspended'
    ];

    protected $appends = ['fullname'];
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function enterprise()
    {
        return $this->belongsTo(\App\Models\Enterprise::class);
    }

    public function user()
    {
        return $this->morphOne(\App\Models\User::class, 'profile');
    }

    // public function avatar()
    // {
    //     return $this->morphOne(File::class, 'fileable');
    // }

    public function getFullnameAttribute(){
        return $this->first_name.', '.$this->last_name;
    }
}
