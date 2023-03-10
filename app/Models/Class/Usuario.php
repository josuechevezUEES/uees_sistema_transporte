<?php

namespace App\Models\Class;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * Conexion a UEES_CLASS
     *
     * @var string
     */
    protected $connection = 'sqlsrv';

    /**
     * TABLA DEL MODELO
     *
     * @var string
     */
    protected $table = 'USUARIOS';

    /**
     * LLAVE PRIMARIA
     *
     * @var string
     */
    public $primaryKey = 'USRUID';

    /**
     * COMPOS EDITABLES
     *
     * @var array
     */
    protected $fillable = [
        'USRUID',
        'USRDSC',
        'USREML'
    ];

    /**
     * LLAVE NO INCREMENTA
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * SIN COLUMNA DATETIME
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];
}
