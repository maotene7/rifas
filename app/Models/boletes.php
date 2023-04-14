<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boletes extends Model
{
    use HasFactory;
    protected $table = 'boletes';

    protected $fillable = [
        'number',
        'id_us',
        'sorteo',
        'status',
        'cod_ref'
        
    ];
}
