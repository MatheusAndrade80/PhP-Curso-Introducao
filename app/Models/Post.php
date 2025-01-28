<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //config gerais
    //relacoes
    protected $fillable = ['title', 'body'];
}
