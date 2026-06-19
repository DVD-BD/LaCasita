<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursal';
    protected $primaryKey = 'id_sucursal';
    protected $fillable = ['nombre', 'direccion', 'telefono', 'ciudad', 'estado', 'latitud', 'longitud', 'url_maps'];

}
