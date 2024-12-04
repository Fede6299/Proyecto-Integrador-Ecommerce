<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NombreLink extends Model
{
    protected $table = "nombreLink";
    protected $primaryKey = "id_link";
    public $timestamps = false;
    public function producto():BelongsTo{
        return $this->belongsTo(Producto::class, 'id_prodDest','id_mate' );
    }
}
