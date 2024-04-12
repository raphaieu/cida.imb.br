<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanalproImagem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $canalpro_id;
    public $url_imagem;
    public $caminho_local;

    protected $table = 'canalpro_imagens';
    protected $fillable = ['canalpro_id', 'url_imagem', 'caminho_local'];

    public $timestamps = false;

    public function canalpro(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Canalpro::class, 'canalpro_id');
    }
}
