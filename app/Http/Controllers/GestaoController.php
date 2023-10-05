<?php

namespace App\Http\Controllers;

use App\Http\Requests\GestaoFormRequest;
use App\Http\Requests\GestaoRequest;
use App\Models\Gestao;
use Illuminate\Http\Request;

class GestaoController extends Controller
{
    public function criarProjeto(GestaoFormRequest $request)
    {
        $gestao = Gestao::created([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_inicio' => $request->data_inicio,
            'data_termino' => $request->data_termino,
            'valor_projeto' => $request->valor_projeto,
            'status' => $request->status
        ]);
       
        return response()->json([
            "success" => true,
            "message" => "Projeto cadastrado",
            "data" => $gestao
        ], 200);
    }

    public function update(GestaoFormRequest $request)
    {
        $gestao = Gestao::find($request-> id);  

        if(!isset($gestao)) {
            return response()->json([
                "success" => true,
                "message" => "projeto atualizado",
            ]);
        }
        if (isset)
    }      
}
