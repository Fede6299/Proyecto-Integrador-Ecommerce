<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NombreLink extends Model
{
    protected $table = "nombrelink";
    protected $primaryKey = "id_link";

    protected $fillable = [
        'nombrelink',
        'id_producto'
    
    ];
    public $timestamps = false;
    public function producto():BelongsTo{
        return $this->belongsTo(Producto::class, 'id_link','id_mate' );
    }
}
