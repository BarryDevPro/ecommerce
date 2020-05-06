<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieEditRequest extends FormRequest
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
        $id = $this->categorie;
        return [
            'libelle'=>'required|string|min:2|unique:categories,libelle,'.$id
        ];
    }

    public function messages()
    {
        return [
            'libelle.unique'=>'la categorie existe dejà entrez une autre svp'
        ];
    }
}
