<?php

namespace App\Models\Vehiculo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloVehiculo extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'modelovehiculos';

    // Define las propiedades que pueden ser asignadas masivamente
    protected $fillable = [
        'idMarcaVehiculo',
        'nombreModeloVehiculo',
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

    // Define la relación con la tabla `marcavehiculos`
    public function marcaVehiculo()
    {
        return $this->belongsTo(MarcaVehiculo::class, 'idMarcaVehiculo', 'idMarcaVehiculo');
    }
}
