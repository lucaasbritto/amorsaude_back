<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    protected $table = 'regionais';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'nome'];

    public function entidades()
    {
        return $this->hasMany(Entidade::class, 'regional_id', 'id');
    }
}
