<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'regional_id',
        'data_inauguracao',
        'ativa'
    ];

    public function regional()
    {
        return $this->belongsTo(Regional::class, 'regional_id', 'id');
    }

    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class, 'entidade_especialidade', 'entidade_id', 'especialidade_id');
    }
}
