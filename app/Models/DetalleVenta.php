<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_venta';
    protected $primaryKey = 'id_detalle_venta';
    protected $fillable = ['id_venta', 'id_producto', 'cantidad', 'precio_unitario'];

protected $casts = ['precio_unitario' => 'decimal:2'];
public function producto(){ return $this->belongsTo(Producto::class, 'id_producto', 'id_producto'); }
public function venta(){ return $this->belongsTo(Venta::class, 'id_venta', 'id_venta'); }

}
