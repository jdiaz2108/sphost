<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $fillable = ['nombre', 'ide', 'telefono', 'direccion', 'ciudad', 'encargado', 'correo', 'nit'];

    public function getRouteKeyName()
	{
	    return 'nit';
	}
}
