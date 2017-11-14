<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    //apuntar a una tabla 
    protected $table='categoria';
    //Espesificar la clave primaria
    protected $primaryKey='idcategoria';

    //deshabilitar marcado de registros
    public $timestamps=false;
    //Define los campos que contendran algun valor
    protected $fillable=[
'nombre',
'descripcion',
'condicion'
    ];

}
