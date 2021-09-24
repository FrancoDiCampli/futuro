<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'company',
        'position',
        'started_at',
        'end_at',
        'actual',
        'description',
        'student_id',
        'city_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'city_id' => 'integer',
        'actual' => 'boolean',
    ];


    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
