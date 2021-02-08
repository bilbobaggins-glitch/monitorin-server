<?php

namespace App\ClassCustoms;

use App\Http\Controllers\Controller;

class ExcecaoMetodoProvider{
    public $excecaoMetodos = array();

    public function adicionar(ExcecaoMetodo $excecaoMetodo){
        $this->excecaoMetodos[] = $excecaoMetodo;
    }

    public function adicionarWithMetodoAndExcecao($metodo, $excecao){
        $excecaoMetodo = new ExcecaoMetodo();
        $excecaoMetodo->metodo = $metodo;
        $excecaoMetodo->excecao = $excecao;
        $this->adicionar($excecaoMetodo);
    }

    public function buscarByMetodo($metodo){
        $excecaoFiltrados = array();

        foreach($this->excecaoMetodos as $excecaoMetodo){
            if($excecaoMetodo->metodo == $metodo){
                $excecaoFiltrados[] = $excecaoMetodo->excecao;
            }
        }

        return $excecaoFiltrados;
    }

    public function excecaoGet(){
        $excecoes = array();

        foreach($this->excecaoMetodos as $excecaoMetodo){
            $excecoes[] = $excecaoMetodo->excecao;
        }
    
        return $excecoes;
    }

    public function contagem(){
        return count($this->excecaoMetodos);
    }

    public function contagemByMetodo($metodo){
        return count($this->buscarByMetodo($metodo));
    }

    public function limpar(){
        $this->excecaoMetodos = array();
    }
}
