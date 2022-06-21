<?php

namespace App\Models;

use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Atividade extends Model
{
    use HasFactory;
    // Definindo a PK
    protected $primaryKey = 'id_atividade';

    /*
    idDisciplina vai o codigo da disciplina;
    Timestamps desligados
    */
    
    public $timestamps = false;

    

    // Evitar que o usuario acesse diretamente o userRole
    protected $fillable = [
        'id_atividade',
        'id_monitor',
        'desc_atividade',
        'tempo_gasto',
        'dia_atividade',
        'mes_atividade',
        'ano_atividade',
    ];


    
    public function atividades()
    {
        return $this->belongsToMany(Monitor::class, 'monitores','id_aluno','id_monitor');
    }

    // public function monitor()
    // {
    //     return $this->hasMany(Monitores::class, 'id_disciplina', 'id_disciplina');
    // }
}