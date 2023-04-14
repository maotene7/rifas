<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bonos extends Model
{
    use HasFactory;
    protected $table = 'bonos';

    protected $fillable = [
        'img',
        'sorteo',
        
    ];
}
