<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';
    protected $fillable = ['id', 'cidade', 'id_estado'];

    public function cidade() {
        return $this->belongsTo(Estado::class, 'id_estado');
    }
}
