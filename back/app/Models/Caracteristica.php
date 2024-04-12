<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;
    protected $table = 'caracteristica';
    protected $primaryKey = 'c_id';
    public $timestamps = false;
    protected $fillable = [
        'c_nome',
        'c_icone',
        'c_tipo'
    ];

    public function imoveis()
    {
        return $this->belongsToMany(Imovel::class, 'imovel_caracteristicas', 'c_id', 'imovel_id');
    }

    public function edificios()
    {
        return $this->belongsToMany(Imovel::class, 'imovel_edf_caracteristicas', 'edf_c_id', 'imovel_id');
    }
}
