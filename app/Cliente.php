<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $fillable = ['nombre', 'ide', 'telefono', 'direccion', 'ciudad', 'encargado', 'nit'];

    public function getRouteKeyName()
	{
	    return 'nit';
	}
}
