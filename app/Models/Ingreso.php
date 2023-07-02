<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ingresos';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha', 'cantidad', 'preciounit', 'producto_id', 'proveedor_id'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
