<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class winners extends Model
{
    use HasFactory;
    protected $table = 'winners';

    protected $fillable = [
        'position',
        'id_user',
        'sorteo',
        'winning_number',
        'porciento',
        'premio'
        
    ];
}
