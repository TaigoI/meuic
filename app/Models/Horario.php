<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    // Definindo a PK
    protected $primaryKey = 'id_horario';

    public $timestamps = false;
    

    // Evitar que o usuario acesse diretamente o userRole
    protected $fillable = [
        'id_horario',
        'id_monitor',
        'id_dia',
        'id_slot',
		'ativo',
        'online'
    ];

    public function monitores(){
        return $this->belongsTo(Monitores::class,'id_monitor','id_aluno');
        // testar isso daqui depois pra asber qual a ordem
    }

	public function dias(){
        return $this->belongsTo(Dia::class,'id_dia','id_dia');
    }

	public function slots(){
        return $this->belongsTo(Slot::class,'id_slot','id_slot');
    } 

	public function agendamento(){
        return $this->hasMany(Agendamento::class,'id_horario','id_horario');
    } 
}
