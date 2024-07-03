<?php

namespace App\Models\Vehiculo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'vehiculos';

    // Especifica el nombre de la clave primaria
    protected $primaryKey = 'idVehiculo';

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

    // Define las relaciones con otras tablas
    public function marcaVehiculo()
    {
        return $this->belongsTo(MarcaVehiculo::class, 'idMarcaVehiculo', 'idMarcaVehiculo');
    }

    public function modeloVehiculo()
    {
        return $this->belongsTo(ModeloVehiculo::class, 'idModeloVehiculo', 'idModeloVehiculo');
    }

    public function afiliado()
    {
        return $this->belongsTo(Afiliado::class, 'idAfilado', 'idAfiliado');
    }

    public function tipoVehiculo()
    {
        return $this->belongsTo(TipoVehiculo::class, 'idTipoVehiculo', 'idTipoVehiculo');
    }

    public function tipoCombustible()
    {
        return $this->belongsTo(TipoCombustible::class, 'idTipoCombustible', 'idTipoCombustible');
    }

    public function trasmision()
    {
        return $this->belongsTo(Trasmision::class, 'idTrasmision', 'idTrasmision');
    }

    public function traccion()
    {
        return $this->belongsTo(Traccion::class, 'idTraccion', 'idTraccion');
    }

    public function categoriaVehiculo()
    {
        return $this->belongsTo(CategoriaVehiculo::class, 'idCategoriaVehiculo', 'idCategoriaVehiculo');
    }
}
