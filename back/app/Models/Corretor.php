<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corretor extends Model
{
    use HasFactory;

    protected $table = 'corretor';
    protected $primaryKey = 'corretor_id';

    protected $fillable = [
        'corretor_creci',
        'corretor_bio',
        'corretor_contato',
        'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
