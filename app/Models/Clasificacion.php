<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clasificacions';

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
    protected $fillable = ['descrip'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
