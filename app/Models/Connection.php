<?php

/**
 * User stories 3.1 en 3.3 — Relaties
 * TODO: belongsTo fromStation/toStation en hasMany trips.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    /** @use HasFactory<\Database\Factories\ConnectionFactory> */
    use HasFactory;
}
