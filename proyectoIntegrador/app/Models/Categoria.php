<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    protected $table = "categorias";
    protected $primaryKey = "id_categoria";
    public $timestamps = false;
    public function productos():BelongsToMany{
        return $this->belongsToMany(Producto::class,'producto_categoria','id_producto','id_categoria');
    }
}
