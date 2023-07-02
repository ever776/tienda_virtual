<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'nacionalidads';

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
    protected $fillable = ['nombre', 'bandera'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
