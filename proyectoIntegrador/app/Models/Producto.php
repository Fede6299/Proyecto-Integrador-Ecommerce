<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Producto extends Model
{
    protected $table = "productos";
    protected $primaryKey = "id_mate";
    public $timestamps = false;
    
    public function categorias():BelongsToMany{
        return $this->belongsToMany(Categoria::class,'producto_categoria','id_producto','id_categoria' );
    }
    public function nombreLink():BelongsTo{
        return $this->belongsTo(NombreLink::class,'id_mate','id_producto' );
    }
}
