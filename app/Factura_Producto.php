<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura_Producto extends Model
{
    protected $fillable = ['nombre', 'qty','factura_id', 'producto_id','descripcion', 'valor'];
}
