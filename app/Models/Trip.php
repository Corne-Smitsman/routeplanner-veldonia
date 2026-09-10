<?php

/**
 * User stories 3.3 en 4.3 — Trips
 * TODO: belongsTo connection + scope die trips vanaf een vertrektijd gesorteerd ophaalt.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    /** @use HasFactory<\Database\Factories\TripFactory> */
    use HasFactory;
}
