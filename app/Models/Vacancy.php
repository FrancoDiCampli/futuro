<?php

namespace App\Models;

use App\Http\Traits\Transactionable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory,Transactionable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
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
        'status',
        'expired_at',
        'city_id',
        'subcategory_id',
        'recruiter_id',
        'plan_id',
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

    const STATUS = [
        'pending',
        'published'
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


    public function scopeFilter($query, $filters)
    {
        if( isset($filters['city_id']) ){
            $query->whereIn('city_id', $filters['city_id']);
        }
        if( isset($filters['experience']) ){
            $query->whereIn('experience', $filters['experience']);
        }
        if( isset($filters['hiring']) ){
            $query->whereIn('hiring', $filters['hiring']);
        }
        if( isset($filters['available']) ){
            $query->whereIn('available', $filters['available']);
        }
        if( isset($filters['schedule']) ){
            $query->whereIn('schedule', $filters['schedule']);
        }
        if( isset($filters['subcategory_id']) ){
            $query->whereIn('subcategory_id', $filters['subcategory_id']);
        }
    }

    public function moves()
    {
        return $this->morphOne(\App\Models\Transaction::class, 'movable');
    }
}
