<?php

/**
 * User story 6.1 — Favorieten
 * TODO: belongsTo user en de opgeslagen stations.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    /** @use HasFactory<\Database\Factories\FavoriteFactory> */
    use HasFactory;
}
