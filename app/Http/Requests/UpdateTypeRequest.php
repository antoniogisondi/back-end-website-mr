<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome_tipologia' => 'required|max:50',
            'descrizione' => 'required|max:300',
        ];
    }

    public function messages(){
        return[
            'nome_tipologia.required'  => 'Il nome è obbligatorio.',
            'nome_tipologia.max'       => 'Il nome non può superare :max caratteri.',
            'descrizione.required' => 'La descrizione è obbligatoria',
            'descrizione.max'   => 'La descrizione non può superare :max caratteri.'
        ];
    }
}
