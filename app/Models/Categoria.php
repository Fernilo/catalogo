<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    private $tale = 'idCategoria';

    protected $primaryKey = 'idCategoria';
    public $timestamps = false;
}
