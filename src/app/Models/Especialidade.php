<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id', 'nome'];

    public function entidades()
    {
        return $this->belongsToMany(Entidade::class, 'entidade_especialidade', 'especialidade_id', 'entidade_id');
    }
}
