<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    //protected $table = 'marcas';
    protected $primaryKey = 'idMarca';//le indico que la primary key tiene otro nombre (por defecto es id)
    public $timestamps = false;
}
