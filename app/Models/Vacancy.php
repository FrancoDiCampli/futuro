<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'looking_for',
        'hiring',
        'available',
        'country',
        'schedule',
        'paid',
        'pretended',
        'skills',
        'experience',
        'enterprise',
        'visible',
        'expired',
        'expired_at',
        'city_id',
        'subcategory_id',
        'recruiter_id',
    ];

    const SKILLS = [
        'Autoconocimiento y Autoconfianza',
        'Inteligencia Emocional',
        'Adaptabilidad y Flexibilidad',
        'Trabajo en Equipo',
        'Capacidad de Liderazgo',
        'Capacidad Crítica',
        'Resolución de Problemas',
        'Toma de Decisiones',
        'Proactividad',
        'Comunicación Efectiva'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'enterprise' => 'boolean',
        'visible' => 'boolean',
        'expired' => 'boolean',
        'expired_at' => 'date',
        'city_id' => 'integer',
        'subcategory_id' => 'integer',
        'recruiter_id' => 'integer',
        'skills'   => 'array',
    ];

    protected $appends=['news','rejected','final'];

    public function recruiter()
    {
        return $this->belongsTo(\App\Models\Recruiter::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(\App\Models\Subcategory::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class,'postulations')->withPivot(['status','visible'])->withTimestamps();
    }

    public function getNewsAttribute(){

        return $this->students()->wherePivot('status','new')->count();
    }

    public function getRejectedAttribute(){

        return $this->students()->wherePivot('status','rejected')->count();
    }
    public function getFinalAttribute(){

        return $this->students()->wherePivot('status','final')->count();
    }

}
