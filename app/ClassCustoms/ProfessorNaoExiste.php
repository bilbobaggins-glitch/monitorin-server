<?php

namespace App\ClassCustoms;

use App\Http\Controllers\Controller;

class ProfessorNaoExiste extends ExcecaoCustom{
    public function __construct(){
        $this->numero = 33;
        $this->nome = "Professor Nao Existe";
        $this->mensagem = "não é professor!!!";
    }

}
