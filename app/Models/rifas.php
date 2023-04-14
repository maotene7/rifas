<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rifas extends Model
{
    use HasFactory;

    protected $table = 'rifas';

    protected $fillable = [
        'premio',
        'del',
        'hasta',
        'bole_adi',
        'fecha_sorteo',
        'img',
        
    ];
}
