<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Writer extends Authenticatable
{
    protected $primaryKey = 'writer_id';
    public $timestamps = true;
    use HasApiTokens, Notifiable;


}
