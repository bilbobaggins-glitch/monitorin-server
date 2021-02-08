<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\ClassCustoms;

class MeuController extends Controller
{
    public $excecaoMetodoProvider;
    public $meuController2;

    public function __construct(){
        $this->excecaoMetodoProvider = new ClassCustoms\ExcecaoMetodoProvider();
        $this->meuController2 = new MeuController2($this->excecaoMetodoProvider);
    }

    public function testepostmanPOST2(Request $request){
        $jsonObjeto = $this->jsonObjGetFromRequest($request);

        return json_encode($jsonObjeto->variavel1);
    }

    public function testepostmanPOST(Request $request){
        $jsonObjeto = $this->jsonObjGetFromRequest($request);

        DB::table('usuarios')
        ->insert([
            'nome' => $jsonObjeto->nome,
            'senha' => $jsonObjeto->senha,
            'usuario' => $jsonObjeto->usuario,
            'sobrenome' => $jsonObjeto->sobrenome
        ]);

        return json_encode($jsonObjeto->variavel1);
    }

    public function login(Request $request){

        try{
            $this->meuController2->login1($request);
        } catch (\Exception $e){
            $this->excecaoMetodoProvider->adicionarWithMetodoAndExcecao("login", new ClassCustoms\NenhumaTurmaSelecionada());
            $this->excecaoMetodoProvider->adicionarWithMetodoAndExcecao("login", new ClassCustoms\NenhumaTurmaSelecionada());
        }

        if($this->excecaoMetodoProvider->contagemByMetodo("login") > 0){
            return json_encode($this->excecaoMetodoProvider->excecaoGet());
        }

        return json_encode(null);

    }

    public function jsonObjGetFromRequest($request){
        $jsonObjeto = new \stdClass();
        $jsonObjeto = json_decode($request->input('mensagem'));

        return $jsonObjeto;
    }
}
