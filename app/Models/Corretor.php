<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corretor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'corretor';
    protected $primaryKey = 'users_id';
    protected $fillable = [
        'corretor_creci',
        'corretor_bio',
        'corretor_contato',
        'users_id'
    ];
}
