<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $table = 'presupuesto';
    protected $primaryKey = 'codigoPresupuesto';

    protected $fillable = [
        'nombrePresupuesto',
        'idUnidad',  // FK a Unidad
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    public function materiales()
    {
        return $this->hasMany(MaterialUnidad::class, 'codigoPresupuesto', 'codigoPresupuesto');
    }
}
