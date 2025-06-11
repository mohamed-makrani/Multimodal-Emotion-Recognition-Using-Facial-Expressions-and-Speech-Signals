<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

// class Admin extends Model
// {

//     protected $guard = 'admin'; // Important

//     protected $fillable = ['name', 'email', 'matricule' , 'password'];

//     protected $hidden = ['password', 'remember_token'];
// }

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'matricule', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
