<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imovel';
    protected $primaryKey = 'imovel_id';
    public $timestamps = false;
    protected $fillable = [
        'corretor_id',
        'tipo_imovel_id',
        'tipo_negocio_id',
        'imovel_titulo',
        'imovel_descricao',
        'imovel_area',
        'imovel_quarto',
        'imovel_banheiro',
        'imovel_suite',
        'imovel_vagas',
        'imovel_preco',
        'imovel_valor_cond',
        'imovel_valor_iptu',
        'imovel_visualizacao',
        'imovel_destaque',
        'imovel_slug',
        'imovel_data_cadastro',
        'imovel_status'
    ];

    public function corretor()
    {
        return $this->belongsTo(Corretor::class, 'corretor_id');
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'endereco_imovel_id');
    }

    public function tipoImovel()
    {
        return $this->belongsTo(TipoImovel::class, 'tipo_imovel_id');
    }

    public function tipoNegocio()
    {
        return $this->belongsTo(TipoNegocio::class, 'tipo_negocio_id');
    }

    public function imagens()
    {
        return $this->hasMany(Imagem::class, 'img_imovel_id');
    }

    public function caracteristicas()
    {
        return $this->hasMany(ImovelCaracteristica::class, 'imovel_id', 'imovel_id');
    }

    public function caracteristicasEdificio()
    {
        return $this->hasMany(ImovelEdfCaracteristica::class, 'imovel_id', 'imovel_id');
    }
}

