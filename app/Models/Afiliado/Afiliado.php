<?php

namespace App\Models\Afiliado;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'afiliados';

    // Define las propiedades que pueden ser asignadas masivamente
    protected $fillable = [
        'idPersona',
        'idBanco',
        'cta',
        'cci',
        'yape',
        'plin',
        'usuCrea',
        'usuMod',
        'bitEstado'
    ];

    // Define los campos que deberían ser transformados a tipos de datos nativos de PHP
    protected $casts = [
        'fecCrea' => 'datetime',
        'fecMod' => 'datetime'
    ];

    // Especifica si el modelo debería gestionar timestamps automáticamente
    public $timestamps = false;

    // Define los campos personalizados para timestamps
    const CREATED_AT = 'fecCrea';
    const UPDATED_AT = 'fecMod';

    // Define las relaciones con otras tablas
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'idPersona');
    }

    public function banco()
    {
        return $this->belongsTo(Banco::class, 'idBanco');
    }

}
