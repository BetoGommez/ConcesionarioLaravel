<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Coch
 *
 * @property $id
 * @property $carroceria_id
 * @property $nombre
 * @property $precio
 * @property $caballos
 * @property $created_at
 * @property $updated_at
 *
 * @property Carroceria $carroceria
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Coch extends Model
{
    
    static $rules = [
		'carroceria_id' => 'required',
		'nombre' => 'required',
		'precio' => 'required|int',
		'caballos' => 'required|int',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['carroceria_id','nombre','precio','caballos'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carroceria()
    {
        return $this->hasOne('App\Models\Carroceria', 'id', 'carroceria_id');
    }
    

}
