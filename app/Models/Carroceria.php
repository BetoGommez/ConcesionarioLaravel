<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carroceria
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Coch[] $coches
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carroceria extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coches()
    {
        return $this->hasMany('App\Models\Coch', 'carroceria_id', 'id');
    }


}
