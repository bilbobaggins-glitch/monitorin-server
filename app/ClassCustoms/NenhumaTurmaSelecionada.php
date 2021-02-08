<?php

namespace App\ClassCustoms;

use App\Http\Controllers\Controller;

class NenhumaTurmaSelecionada extends ExcecaoCustom{

    public function __construct(){
        $this->numero = 301;
        $this->nome = "Nenhuma Turma Selecionada";
        $this->mensagem = "Por favor, adicione uma turma!";
    }
}
