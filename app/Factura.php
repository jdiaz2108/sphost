<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['nombre', 'ide', 'telefono', 'direccion', 'ciudad', 'encargado', 'nit', 'date'];

    public function productos()
    {
        return $this->hasMany('App\Factura_Producto');
    }

}
