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
        'enterprise_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function enterprise()
    {
        return $this->belongsTo(\App\Models\Enterprise::class);
    }

    public function user()
    {
        return $this->morphOne(\App\Models\User::class, 'profile');
    }

    public function avatar()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
