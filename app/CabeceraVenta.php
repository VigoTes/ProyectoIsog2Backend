<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CabeceraVenta extends Model
{
    protected $table = "cabeceraventas";
    protected $primaryKey ="venta_id";

    public $timestamps = false;  //para que no trabaje con los campos fecha 


    // le indicamos los campos de la tabla 
    protected $fillable = ['cliente_id','tipo_id','fecha_venta',
                            'nrodoc','subtotal','igv','total','estado'];


    public function cliente(){
        return $this->hasOne('App\Cliente','cliente_id','cliente_id');

    }
    public function tipo(){
        return $this->hasOne('App\Tipo','tipo_id','tipo_id');

    }
}
