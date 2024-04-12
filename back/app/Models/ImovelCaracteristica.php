<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImovelCaracteristica extends Model
{
    use HasFactory;
    protected $table = 'imovel_caracteristicas';
    public $incrementing = false; // Desative o auto-incremento, pois a chave primária é composta.
    protected $primaryKey = ['imovel_id', 'c_id']; // Defina a chave primária composta.

    protected $fillable = [
        'imovel_id',
        'c_id',
        'valor'
    ];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class, 'imovel_id');
    }

    public function caracteristica()
    {
        return $this->belongsTo(Caracteristica::class, 'c_id');
    }

    public function condominio()
    {
        return $this->belongsTo(Imovel::class, 'imovel_id', 'imovel_id');
    }
}
