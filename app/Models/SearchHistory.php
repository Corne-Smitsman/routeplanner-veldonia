<?php

/**
 * User story 6.5 — Reisgeschiedenis
 * TODO: belongsTo user en de gezochte stations.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    /** @use HasFactory<\Database\Factories\SearchHistoryFactory> */
    use HasFactory;
}
