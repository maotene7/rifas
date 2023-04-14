<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promocional extends Model
{
    use HasFactory;
    protected $table = 'promocionals';

    protected $fillable = [
        'name',
        'codigo',
        
    ];
}
