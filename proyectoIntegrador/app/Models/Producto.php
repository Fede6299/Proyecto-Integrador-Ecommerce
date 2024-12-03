<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $table = "productos";
    protected $primaryKey = "id_mate";
    public $timestamps = false;
    
    public function categorias():BelongsTo{
        return $this->belongsTo(Categoria::class, 'id_mate','id_categoria' );
    }
}
