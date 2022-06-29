<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_slots';

    
    public $timestamps = false;
    

    // Evitar que o usuario acesse diretamente o userRole
    protected $fillable = [
    'id_slots',
    'display_name',
    'start_slot',
    'end_slot',
    ];

    // adicionar relação de agendamento e horario

    public function agendamento(){
        
    }
}
