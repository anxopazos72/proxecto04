<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['nombre', 'email', 'texto_comentario', 'post', 'aprobado'];
}
