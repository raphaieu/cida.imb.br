<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImovelEdfCaracteristica extends Model
{
    use HasFactory;
    protected $table = 'imovel_edf_caracteristicas';
    public $incrementing = false; // Desative o auto-incremento para chaves primárias compostas.
    protected $primaryKey = ['imovel_id', 'edf_c_id']; // Chave primária composta.

    protected $fillable = [
        'imovel_id',
        'edf_c_id',
        'valor'
    ];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class, 'imovel_id');
    }

    public function caracteristica()
    {
        return $this->belongsTo(Caracteristica::class, 'edf_c_id');
    }
}
