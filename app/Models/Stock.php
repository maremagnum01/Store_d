<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 *
 * @property $id
 * @property $marca
 * @property $modelo
 * @property $estado
 * @property $color
 * @property $stock
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Stock extends Model
{
    
    static $rules = [
		'marca' => 'required',
		'modelo' => 'required',
		'memoria' => 'required',
		'estado' => 'required',
		'color' => 'required',
		'stock' => 'required',
    'img' => 'image|mimes:png,jpg,jpge,svg,gif,webp|max:2048',
    'descripcion' => '',
		'precio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['marca','modelo','memoria','estado','color','stock','img','descripcion','precio'];



}
