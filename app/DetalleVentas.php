<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVentas extends Model
{
    protected $table = "detalleventas";
    public $timestamps = false;  //para que no trabaje con los campos fecha 
// la clave es doble  entons no le ponemos

    // le indicamos los campos de la tabla 
    protected $fillable = ['precio','cantidad'];





}
