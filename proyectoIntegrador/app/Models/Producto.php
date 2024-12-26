<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Producto extends Model
{
    protected $table = "productos";
    protected $primaryKey = "id_mate";
    
    protected $fillable = [
        'descripcion',
        'precio',
        'cantidad',
        'estado',
        'eliminado',
        'imgUrl'
    
    ];
    public function categorias():BelongsToMany{
        return $this->belongsToMany(Categoria::class,'producto_categoria','id_producto','id_categoria' );
    }
    public function nombreLink():HasOne{
        return $this->hasOne(NombreLink::class ,'id_producto','id_mate');
    }
    public function destacados():HasOne{
        return $this->hasOne(Destacados::class,'id_mate','id_prodDest');
    }
}
