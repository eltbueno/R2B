<?php

namespace r2b\Http\Requests;
use r2b\Http\Requests\Request;

class ValidaUser extends Request
{
    protected $redirect = "usuario_novo";
    
    public function rules()
    {
        return
        [
            'nome'=> 'required|min:3',
            'login'=> 'required|unique:users',
            'email'=> 'required|email',
            'password'=> 'required | min:6 | confirmed',
            
            'password_confirmation'=> 'required',
            'perfil'=> 'required',
        ];
    }
    
    public function messages()
    {
        return
        [
            'nome.required'=>'O Nome é Obrigatório',
            'nome.min'=>'O Nome deve ter mais de três caracteres',
            'login.required'=>'Login é obrigatorio',            
            'login.unique'=>'Já existe um login igual ao preenchido',
            'email.required'=>'E-Mail é obrigatório',
            'email.email'=>'O e-mail fornecido parece incorreto',
            'password.required'=>'A senha é obrigatória',
            'password.confirmed'=>'As senhas devem ser iguais',
            'password.min'=>'A Senha deve ter seis ou mais caracteres',
            'password_confirmation.required'=>'A confirmação da senha é obrigatória',
            
            'perfil.required'=>'Perfil é Obrigatorio',
        ];        
    }
    
    public function response(array $errors)
    {
        return redirect($this->redirect)
                ->withErrors($errors,'formuser')
                ->withInput();        
    }
    public function authorize() {
        return true;
        
    }
}