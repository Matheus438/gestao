<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestao extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descricao',
        'data_inicio',
        'data_termino',
        'valor_projeto',
        'status',
    ];
    
}
