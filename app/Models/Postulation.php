<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vacancy_id',
        'student_id',
        'visible',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'vacancy_id' => 'integer',
        'student_id' => 'integer',
        'visible' => 'boolean',
    ];


    public function vacancy()
    {
        return $this->belongsTo(\App\Models\Vacancy::class);
    }

    public function student()
    {
        return $this->belongsTo(\App\Models\Student::class);
    }
}