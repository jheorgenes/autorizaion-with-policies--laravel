<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// inserir manualmente essa importação e apelide ela de Authenticable
use Illuminate\Foundation\Auth\User as Authenticable;

/** Definindo para usar a autenticação do Laravel */
class User extends Authenticable
{
    //
}
