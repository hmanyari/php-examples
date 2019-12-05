<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugos extends Model
{
    protected $table = 'jugos';

    protected $fillable = ['nombre', 'precio', 'stock', 'img'];
}
