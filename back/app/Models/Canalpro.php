<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canalpro extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'canalpro';
    protected $fillable = ['canalpro_id', 'canalpro_json', 'slug', 'zapimoveis_json'];

    public $timestamps = false;

    public function imagens()
    {
        return $this->hasMany(CanalproImagem::class, 'canalpro_id');
    }
}
