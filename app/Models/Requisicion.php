<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    use HasFactory;

    protected $table = 'requisicion';
    protected $primaryKey = 'idRequisicion';

    protected $fillable = [
        'fecha',
        'estado',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
   
}
