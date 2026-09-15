<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

class Station extends Model
{
    protected $fillable = ['code', 'name', 'region', 'population'];
}
