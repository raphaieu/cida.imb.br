<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;
    protected $table = 'imagem';
    protected $primaryKey = 'img_id'; // Se necessário, você pode usar um array para chaves primárias compostas.

    protected $fillable = [
        'img_imovel_id',
        'img_nome',
        'img_titulo',
        'img_ordem',
        'img_destaque'
    ];

    public function imovel()
    {
        return $this->belongsTo(Imovel::class, 'img_imovel_id');
    }

}
