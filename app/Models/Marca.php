<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'marcas';

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
    protected $fillable = ['nombre', 'logo'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
