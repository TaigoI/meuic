<?php

namespace App\Models;

use Illuminate\Contracts\Queue\Monitor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_agendamento';

    
    public $timestamps = false;
    

    protected $fillable = [
        'id_agendamento',
        'id_disciplina',
        'id_monitor',
        'data_agendamento',
        'slot_agendamento',
        'anotacao_agendamento',
        'topico_agendamento',
    ];

    // Adicionar o de slot aqui
    public function modulo()
    {
        return $this->belongsTo(Monitor::class, 'id_monitor','id_monitor');
        // testar isso daqui
    }

    public function slot(){
        return $this->hasMany(Slot::class,'id_slots','slot_agendamento');
        // testar a inversao disso aqui
    }
}
