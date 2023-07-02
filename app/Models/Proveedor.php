<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proveedors';

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
    protected $fillable = ['nombre', 'propietario', 'cinit', 'telcelular', 'direccion'];

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }
}
