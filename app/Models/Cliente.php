<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $fillable = ['nombre', 'telefono', 'correo', 'ciudad', 'codigo_postal', 'direccion', 'estado'];

}
