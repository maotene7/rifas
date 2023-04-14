<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boletos_aleatorio extends Model
{
    use HasFactory;
    protected $table = 'boletos_aleatorios';

    protected $fillable = [
        'number',
        'id_us',
        'sorteo',
        'status',
        
    ];
}
