<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'valor', 'descripcion', 'destacado', 'color', 'cantidad', 'orden', 'slug'];

    public function getRouteKeyName()
	{
	    return 'slug';
	}

	protected $hidden = [
    	//
    ];
}
