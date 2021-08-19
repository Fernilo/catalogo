<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProducto';//Cambiamos el name de la clave primario(por defecto laravel toma 'id') 

    public $timestamps = false;//descativamos el seteo del los atributos 'created_at' y 'update_at' que son seteados por defecto en laravel

    public function getMarca()
    {
        return $this->belongsTo(
            Marca::class,
            'idMarca',
            'idMarca'
        );
    }
}
