<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitEditRequest extends FormRequest
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
        $id = $this->produit;
        return [
    
            'name' => 'required|string|unique:produits,name,'.$id,
           
        ];
    }

    public function messages()
    {
        return [
 
            'name.unique' => 'Ce nom du produit est deja utilisé'
        ];
    }
}
