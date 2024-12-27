<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Galeria extends Model
{
    protected $table = "galeria";
    protected $primaryKey = "id_imagen";
    public $timestamps = false;
    protected $fillable = [ 'id_mate', 'imgUrl2' ];
    public function productos():HasOne{
        return $this->hasOne(Producto::class, 'id_mate','id_imagen', 'imgUrl2');
    }
}