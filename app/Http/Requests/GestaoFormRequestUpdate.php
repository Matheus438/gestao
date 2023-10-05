<?php

namespace App\Http\Requests;

use GrahamCampbell\ResultType\Success;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GestaoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|max:150|min:5|unique:gestao,' . $this->id,
            'descricao' => 'required|max:200|min:10',
            'data_inicio' => 'required|date',
            'data_termino' => 'date',
            'valor_projeto' => 'required|decimal:2',
            'status' => 'required',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'titulo.required'=> 'O campo titulo é obrigatorio',
            'titulo.max' => 'o titulo deve comter no  maximo 150 caracteres',
            'titulo.min' => 'o titulo deve conter no minimo 5 caracteres',
            'titulo.unique' => 'este titulo ja foi cadastrado',
            'descricao.required' => 'o campo descrição é obrigatorio',
            'descricao.max' => 'o campo descrição deve conter no maximo 200 caracteres',
            'descricao.min' => 'este campo deve conter no maximo 10 caracteres',
            'data_inicio.required' => 'este campo é obrigatorio',
            'valor_projeto.required' => 'este campo é obrigatorio',
            'data_termino.date' => 'deve estar no formato ed data',
            'valor_projeto.decimal' => 'deve ser preenchido em formato decimal',
            'status.required' => 'este campo é obrigatório',
        ];
    }
}