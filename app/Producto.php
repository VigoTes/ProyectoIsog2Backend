<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Unidad;


class Producto extends Model
{
    protected $table = "productos";
    protected $primaryKey ="codproducto";

    public $timestamps = false;  //para que no trabaje con los campos fecha 


    // le indicamos los campos de la tabla 
    protected $fillable = ['descripcion','codcategoria','codunidad','stock','precio','estado'];

    public function categoria(){
            return $this->hasOne('App\Categoria','codcategoria','codcategoria');

    }
    public function unidad(){
        return $this->hasOne('App\Unidad','codunidad','codunidad');

}
}
