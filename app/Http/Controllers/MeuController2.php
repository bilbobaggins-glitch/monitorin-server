<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\ClassCustoms;

class MeuController2 extends Controller
{
    public $excecaoMetodoProvider;

    public function __construct($excecaoMetodoProvider){
        $this->excecaoMetodoProvider = $excecaoMetodoProvider;
    }
    
    public function login1(Request $request){
        $this->excecaoMetodoProvider->adicionarWithMetodoAndExcecao("login1", new ClassCustoms\ProfessorInexistente());
        $this->excecaoMetodoProvider->adicionarWithMetodoAndExcecao("login1", new ClassCustoms\ProfessorNaoExiste());

        if($this->excecaoMetodoProvider->contagemByMetodo("login1") > 0){
            $minhasExcecoes = $this->excecaoMetodoProvider->buscarByMetodo("login1");

            throw new \Exception();
        }
            return json_encode(50);
    }

    public function professorGetByUserAndPassword($usuario, $senha){
        $professor = DB::table('usuarios')
        ->where('usuario', '=', $usuario)
        ->where('senha', '=', $senha)
        ->get();

        if(count($professor) != 1){
            $this->excecaoMetodoProvider->adicionarWithMetodoAndExcecao('professorGetByUserAndPassword', new ClassCustoms\ProfessorInexistente());
        }

        if($this->excecaoMetodoProvider->contagemByMetodo('professorGetByUserAndPassword') > 0){
            throw new \Exception();
        } else {
            return $professor;
        }
    }
}
