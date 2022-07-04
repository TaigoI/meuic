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
        'id_horario',
        'data',
        'topico',
        'anotacao',
    ];

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario','id_horario')->orderBy('id_dia', 'ASC')->orderBy('id_slot', 'ASC');
        // testar isso daqui
    }
}
