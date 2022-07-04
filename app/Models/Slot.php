<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_slot';

    
    public $timestamps = false;
    

    // Evitar que o usuario acesse diretamente o userRole
    protected $fillable = [
    'id_slot',
    'display_name',
    'start_slot',
    'end_slot',
    ];

	public function horario(){
        return $this->hasMany(Horario::class,'id_slot','id_slot');
    } 
}
