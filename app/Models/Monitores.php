<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitores extends Model
{
    use HasFactory;
    // Definindo a PK
    protected $table = 'monitores';
    protected $primaryKey = 'id_monitor';

    /*
    As proximas duas linhas sao para evitar que ele tente incrementar
    a PK automaticamente, além de definir que o tipo é uma string.
    
    Necessário porque se não o Laravel vai tentar tratar como um int

    Timestamps desligados
    */
       
    public $timestamps = false;
    

    // Evitar que o usuario acesse diretamente o userRole
    protected $fillable = [
        'id_aluno',
        'id_disciplina'
    ];

    // Definindo a relacao de FK
    // Tem que alterar depois no banco a questao do email como PK
    public function id_aluno(){
        return $this->hasOne(User::class,'email');
    }
}