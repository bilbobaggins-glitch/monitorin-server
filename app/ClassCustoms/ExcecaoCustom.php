<?php

namespace App\ClassCustoms;

use App\Http\Controllers\Controller;

class ExcecaoCustom extends \Exception{
    public $numero;
    public $nome;
    public $mensagem;
}
