<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    /** @use HasFactory<\Database\Factories\ConnectionFactory> */
    use HasFactory;

    protected $fillable = [
        'from_station_id',
        'to_station_id',
        'distance_km',
        'duration_minutes',
    ];

    protected function casts(): array
    {
        return [
            'distance_km' => 'integer',
            'duration_minutes' => 'integer',
        ];
    }
}
