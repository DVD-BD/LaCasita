<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promocion';
    protected $primaryKey = 'id_promocion';
    protected $fillable = ['nombre', 'descuento', 'fecha_inicio', 'fecha_fin', 'vigente', 'descripcion', 'imagen'];

protected $casts = ['vigente' => 'boolean', 'fecha_inicio' => 'date', 'fecha_fin' => 'date'];
public function productos(){ return $this->belongsToMany(Producto::class, 'producto_promocion', 'id_promocion', 'id_producto'); }

}
