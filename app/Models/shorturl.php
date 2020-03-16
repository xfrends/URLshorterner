<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class shorturl extends Model
{
    protected $table = 'shorturl';
    protected $fillable = ['fullurl', 'shorturl'];
}
