<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'email';

    /*
    As proximas duas linhas sao para evitar que ele tente incrementar
    a PK automaticamente, além de definir que o tipo é uma string.
    
    Necessário porque se não o Laravel vai tentar tratar como um int

    Timestamps desligados
    */
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    

    // Evitar que o usuario acesse diretamente o userRole
    protected $fillable = [
        'ID',
        'email',
        'matricula',
        'name',
        'picture',
    ];

    
    public function monitores()
    {
        return $this->hasOne(Monitores::class, 'id_aluno');
    }

    
}
