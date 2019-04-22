<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $fillable = ['nombre', 'ide', 'telefono', 'direccion', 'ciudad', 'encargado', 'correo', 'nit', 'slug'];

    public function getRouteKeyName()
	{
	    return 'slug';
	}

	protected $hidden = [
    	//
    ];
}
