<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Material extends Model
{
    use HasFactory;
    protected $table = 'material';
    protected $primaryKey = 'codigo';

    protected $fillable = [
        'categoria',
        'descripcion',
        'unidadMedida',
        'ubicacion',
      
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria', 'idCategoria');
    }
}
