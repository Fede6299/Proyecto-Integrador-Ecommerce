<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Destacados extends Model
{
    protected $table = "destacados";
    protected $primaryKey = "id_destacados";
    public $timestamps = false;
    protected $fillable = ['id_prodDest'];
    public function producto():BelongsTo{
        return $this->belongsTo(Producto::class, 'id_prodDest','id_mate' );
    }
}
