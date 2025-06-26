<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    use HasFactory;

    protected $table = 'material_unidad';
    protected $primaryKey = 'idMaterialUnidad';

    protected $fillable = [
        'cantidad',
        'codigo',             // FK a Material
        'idUnidad',           // FK a Unidad
        'codigoPresupuesto',  // FK a Presupuesto
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'codigo', 'codigo');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'codigoPresupuesto', 'codigoPresupuesto');
    }
}
