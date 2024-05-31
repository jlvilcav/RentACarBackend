<?php

namespace App\Models\Vehiculo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'vehiculos';

    // Define las propiedades que pueden ser asignadas masivamente
    protected $fillable = [
        'idMarcaVehiculo',
        'idModeloVehiculo',
        'placa',
        'motor',
        'anio',
        'kilometraje',
        'gps',
        'fechaSoat',
        'fechaInspeccionVehicular',
        'idAfilado',
        'idTipoVehiculo',
        'idTipoCombustible',
        'idTrasmision',
        'idTraccion',
        'idCategoriaVehiculo',
        'precioAlquiler',
        'observacion',
        'usuCrea',
        'usuMod',
        'bitEstado'
    ];

    // Define los campos que deberían ser transformados a tipos de datos nativos de PHP
    protected $casts = [
        'fechaSoat' => 'date',
        'fechaInspeccionVehicular' => 'date',
        'fecCrea' => 'datetime',
        'fecMod' => 'datetime'
    ];

    // Especifica si el modelo debería gestionar timestamps automáticamente
    public $timestamps = false;

    // Define los campos personalizados para timestamps
    const CREATED_AT = 'fecCrea';
    const UPDATED_AT = 'fecMod';
}
