<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'clientes';

    // Define las propiedades que pueden ser asignadas masivamente
    protected $fillable = [
        'idPersona',
        'idPais',
        'nacionalidad',
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

    // Define las relaciones con las tablas `personas` y `paises`
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'idPersona', 'id');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'idPais', 'id');
    }
}
