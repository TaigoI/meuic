<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    // Definindo a PK
    protected $primaryKey = 'id_horario';

    /*
    As proximas duas linhas sao para evitar que ele tente incrementar
    a PK automaticamente, além de definir que o tipo é uma string.
    
    Necessário porque se não o Laravel vai tentar tratar como um int

    Timestamps desligados
    */
       
    public $timestamps = false;
    

    // Evitar que o usuario acesse diretamente o userRole
    protected $fillable = [
        'id_horario',
        'id_monitor',
        'dia',
        'slot_inicial',
        'slot_final',
    ];

    public function monitores(){
        return $this->belongsTo(Monitores::class,'id_monitor','id_aluno');
        // testar isso daqui depois pra asber qual a ordem
    } 

}
