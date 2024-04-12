<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoImovel extends Model
{
    use HasFactory;
    protected $table = 'tipo_imovel';
    protected $primaryKey = 'tipo_id';

    protected $fillable = [
        'tipo_res_com',
        'tipo_descricao'
    ];
}
