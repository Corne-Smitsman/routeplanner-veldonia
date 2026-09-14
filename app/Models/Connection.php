<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $fillable = ['from_station_id', 'to_station_id', 'distance_km', 'duration_minutes'];
}
