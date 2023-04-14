<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boletosAditiones extends Model
{
    use HasFactory;

     protected $table = 'boletos_aditiones';

    protected $fillable = [
        'number',
        'sorteo',
        'status'
        
    ];
}
