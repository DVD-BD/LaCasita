<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'id_inventario';
    protected $fillable = ['id_producto', 'id_sucursal', 'stock', 'stock_minimo'];

public function producto(){ return $this->belongsTo(Producto::class, 'id_producto', 'id_producto'); }
public function sucursal(){ return $this->belongsTo(Sucursal::class, 'id_sucursal', 'id_sucursal'); }

}
