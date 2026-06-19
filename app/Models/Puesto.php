<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table = 'puesto';
    protected $primaryKey = 'id_puesto';
    protected $fillable = ['nombre', 'descripcion'];

}
