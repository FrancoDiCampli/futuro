<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Facade\FlareClient\Glows\Recorder;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles,HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = ['profile'];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
      return $this->morphTo();
    }

    public function getHasEnterpriseProfileAttribute()
    {
      return $this->profile_type == 'App\Models\Enterprise';
    }
    public function getHasStudentProfileAttribute()
    {
        return $this->profile_type == 'App\Models\Student';
    }

    public function getHasRecruiterProfileAttribute()
    {
        return $this->profile_type == 'App\Models\Recruiter';
    }




}
