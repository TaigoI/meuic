<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Disciplina extends Model
{
    use HasFactory;
    // Definindo a PK
    protected $primaryKey = 'id_disciplina';

    /*
    idDisciplina vai o codigo da disciplina;
    Timestamps desligados
    */
    protected $keyType = 'string';
    public $timestamps = false;

    

    // Evitar que o usuario acesse diretamente o userRole
    protected $fillable = [
        'id_disciplina',
        'name_disciplina'
    ];

    public function modulo()
    {
        return $this->belongsToMany(Modulo::class, 'modulos','id_disciplina','id_disciplina');
    }
}