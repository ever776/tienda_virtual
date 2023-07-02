<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productos';

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
    protected $fillable = ['nombre', 'descrip', 'precioant', 'precio', 'stock', 'destacado', 'foto', 'clasificacion_id', 'marca_id', 'nacionalidad_id'];

    public function clasificacion()
    {
        return $this->belongsTo(Clasificacion::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class);
    }

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }
}
