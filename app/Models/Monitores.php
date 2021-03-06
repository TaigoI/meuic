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
        'id_disciplina',
		'cor'
    ];

    /*

    
    Basicamente, aqui é criando os relacionamentos no banco de dados para que seja possível:

    Monitores::find(1)->disciplina->name_disciplina;

    Retornar o nome da disciplina que está associada ao monitor de id 1.
    */
    
    public function aluno(){
        return $this->belongsTo(User::class,'id_aluno','email');
        // Primeiro vem o que ta no arquivo e depois vem o do outro lado
    }

    public function disciplina(){
        return $this->belongsTo(Disciplina::class,'id_disciplina','id_disciplina');
    }

    public function atividades(){
        return $this->hasMany(Atividade::class,'id_monitor','id_aluno');
    }

    public function horarios(){
        return $this->hasMany(Horario::class,'id_monitor','id_aluno');
    }
    
    public function agendamentos(){
        // agendamentos de cada monitor
        return $this->hasMany(Agendamento::class,'id_monitor','id_aluno');
    }
}