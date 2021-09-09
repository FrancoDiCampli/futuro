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
        'enterprise',
        'visible',
        'expired_at',
        'city_id',
        'subcategory_id',
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
        'expired_at' => 'timestamp',
        'city_id' => 'integer',
        'subcategory_id' => 'integer',
    ];


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
}
