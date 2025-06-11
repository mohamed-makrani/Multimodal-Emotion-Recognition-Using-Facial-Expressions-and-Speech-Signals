<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // use HasFactory;

    protected $fillable = [
        'agent_id',
        'name',
        'email',
        'phone',
        'product',
        'quantite',
        'emotion', // Assure-toi qu’il est là
    ];
}
