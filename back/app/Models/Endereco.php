<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'endereco';
    protected $primaryKey = 'endereco_id';

    protected $fillable = [
        'endereco_imovel_id',
        'endereco_logradouro',
        'endereco_bairro',
        'endereco_municipio',
        'endereco_uf',
        'endereco_cep',
        'endereco_zona',
        'endereco_regiao',
        'endereco_maps'
    ];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class, 'endereco_imovel_id');
    }

}
