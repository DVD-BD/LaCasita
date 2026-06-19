<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'id_venta';
    protected $fillable = ['id_cliente', 'id_empleado', 'id_sucursal', 'id_metodo', 'fecha', 'hora', 'estado', 'total'];

protected $casts = ['fecha' => 'date', 'total' => 'decimal:2'];
public function cliente(){ return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente'); }
public function empleado(){ return $this->belongsTo(Empleado::class, 'id_empleado', 'id_empleado'); }
public function sucursal(){ return $this->belongsTo(Sucursal::class, 'id_sucursal', 'id_sucursal'); }
public function metodo(){ return $this->belongsTo(MetodoPago::class, 'id_metodo', 'id_metodo'); }
public function detalles(){ return $this->hasMany(DetalleVenta::class, 'id_venta', 'id_venta'); }

}
