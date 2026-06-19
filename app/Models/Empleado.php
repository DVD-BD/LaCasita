<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    protected $primaryKey = 'id_empleado';
    protected $fillable = ['nombre', 'telefono', 'correo', 'id_puesto', 'id_sucursal', 'nivel_responsabilidad', 'bono', 'estado'];

public function puesto(){ return $this->belongsTo(Puesto::class, 'id_puesto', 'id_puesto'); }
public function sucursal(){ return $this->belongsTo(Sucursal::class, 'id_sucursal', 'id_sucursal'); }

}
