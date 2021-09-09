<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'enterprise',
        'ceo',
        'city_id',
        'started_at',
        'end_at',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'city_id' => 'integer',
        'started_at' => 'date',
        'end_at' => 'date',
    ];


    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }
}
