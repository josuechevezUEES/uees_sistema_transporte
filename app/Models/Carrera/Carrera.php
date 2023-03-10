<?php

namespace App\Models\Carrera;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    /**
     * CONEXIONS A BASE DE DATOS
     *
     * @var string
     */
    protected $connection = "sqlsrv";

    /**
     * TABLA DEL MODELO
     *
     * @var string
     */
    protected $table = "NIVELES";

    /**
     * LLAVE PRIMARIA
     *
     * @var string
     */
    protected $primaryKey = "NIVCOD";

    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Si la llave primary es un string
     * agregar que no es auto incrementable
     *
     * @var boolean
     */
    public $incrementing = false;
}
