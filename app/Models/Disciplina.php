<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Illuminate\Database\Eloquent\Relations\HasMany;

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
        'name_disciplina',
		'cor'
    ];


    
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_disciplina', 'id_disciplina');
    }

    public function monitor()
    {
        return $this->hasMany(Monitores::class, 'id_disciplina', 'id_disciplina');
    }
}