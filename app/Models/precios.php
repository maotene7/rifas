<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class precios extends Model
{
    use HasFactory;

    protected $table = 'precios';

    protected $fillable = [
        'precio',
        'description',
        'sorteo',
        
    ];
}
