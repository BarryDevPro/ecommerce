<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|min:2',
            'prenom' => 'required|min:4',
            'email' => 'required|email|unique:clients',
            'telephone' => 'required|min:9|unique:clients',
            'adresse' => 'required',
            'password' => 'required|min:5|confirmed'

        ];
    }
    public function messages()
    {
        return [
            'nom.min' => 'La taille du nom doit etre superieur à 1',
            'nom.required'  => 'Le nom est obligatoire',
            'prenom.min' => 'La taille du prenom doit etre superieur à 4',
            'prenom.required'  => 'Le prenom est obligatoire',
            'email.unique' => 'Cet email est deja utilisé',
            'email.required'  => 'Le mail est obligatoire',
            'telephone.min' => 'Le telephone doit avoir au mininum 9 chiffres',
            'telephone.required'  => 'Le telephone est obligatoire',
            'telephone.unique' => 'Ce numero est deja utilisé',
            'adresse.required' => 'L\'adresse est obligatoire',
            'password.required'  => 'Le mot de pass est obligatoire',
            'password.min' => 'Mot de pass  doit etre superieur à 4',
            'password.confirmed'  => 'Les mots de pass doivent etre identiques',
        ];
    }
}
