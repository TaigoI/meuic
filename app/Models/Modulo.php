<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modulo extends Model
{
    use HasFactory;
    // Definindo a PK
    protected $primaryKey = 'id_modulo';

    /*
    As proximas duas linhas sao para evitar que ele tente incrementar
    a PK automaticamente, além de definir que o tipo é uma string.
    
    Necessário porque se não o Laravel vai tentar tratar como um int

    Timestamps desligados
    */
       
    public $timestamps = false;
    

    // Evitar que o usuario acesse diretamente o userRole
    protected $fillable = [
        'modulo',
        'id_disciplina'
    ];

    public function disciplinas(){
        
            return $this->hasMany(Disciplina::class, 'id_disciplina', 'id_disciplina');
        
    }

    
}