<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'seccion', 'autor'];
	use SoftDeletes;
	protected $dates = ['deleted_at'];
}
