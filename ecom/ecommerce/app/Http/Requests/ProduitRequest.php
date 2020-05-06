<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
            
            'name' => 'required|string|min:2|unique:produits',
            'quantite' => 'required',
            'prixUnitaire'  => 'required',
            'categories_id' => 'required',
            'image'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.unique'=>'le nom du produit existe dejà'
        ];
    }
}
