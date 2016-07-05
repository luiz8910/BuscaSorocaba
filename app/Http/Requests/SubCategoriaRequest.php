<?php

namespace BuscaSorocaba\Http\Requests;

use BuscaSorocaba\Http\Requests\Request;

class SubCategoriaRequest extends Request
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
            'nome' => 'required|unique:subcategorias,nome'
        ];
    }
}
