<?php

/**
 * User stories 3.1 en 3.2 — Relaties
 * TODO: fillable + hasMany naar vertrekkende en aankomende connections.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    /** @use HasFactory<\Database\Factories\StationFactory> */
    use HasFactory;
}
