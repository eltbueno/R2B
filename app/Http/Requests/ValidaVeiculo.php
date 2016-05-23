<?php

namespace r2b\Http\Requests;
use r2b\Http\Requests\Request;

class ValidaVeiculo extends Request
{
    protected $redirect = "veiculo_novo";
    
    public function rules()
    {
        return
        [
            //'placa'=> 'required|min:7|max:7|unique:veiculos|regex:/^[a-z]{3}\?[0-9]{4}+$/',
            'placa'=> 'required|unique:veiculos|regex:/^[a-z]{3}[0-9]{4}$/',
            'chassi'=> 'required|unique:veiculos|between:17,17',
        ];
    }
    
    public function messages()
    {
        return
        [
            'placa.required'=>'placa é obrigatoria',            
            'placa.unique'=>'já existe um veículo com essa placa',
            'placa.regex'=>'formato deve ser LLLNNNN',
            'chassi.required'=>'O Chassi deve ser preenchido',
            'chassi.unique'=>'Já existe um veículo com esse número de chassi',
            'chassi.between'=>'O Chassi deve ter 17 caracteres.',
        ];        
    }
    
    public function response(array $errors)
    {
        return redirect($this->redirect)
                ->withErrors($errors,'formveiculo')
                ->withInput();        
    }
    public function authorize() {
        return true;
        
    }
}