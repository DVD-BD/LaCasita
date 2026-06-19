<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $fillable = ['id_categoria', 'id_proveedor', 'nombre', 'descripcion', 'codigo_barras', 'precio', 'stock', 'imagen', 'activo'];

protected $casts = ['activo' => 'boolean', 'precio' => 'decimal:2'];
public function categoria(){ return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria'); }
public function proveedor(){ return $this->belongsTo(Proveedor::class, 'id_proveedor', 'id_proveedor'); }
public function promociones(){ return $this->belongsToMany(Promocion::class, 'producto_promocion', 'id_producto', 'id_promocion'); }

}
