<?php

namespace App\ClassCustoms;

use App\Http\Controllers\Controller;

class ProfessorInexistente extends ExcecaoCustom{
    public function __construct(){
        $this->numero = 590;
        $this->nome = "Professor Inexistente";
        $this->mensagem = "Dados não conferem com o cadastro de nenhum professor. Você é mesmo um professor?";
    }
}
