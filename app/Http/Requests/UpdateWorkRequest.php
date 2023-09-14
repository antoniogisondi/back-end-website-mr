<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkRequest extends FormRequest
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
            'titolo' => 'required|max:50',
            'descrizione' => 'required|max:300',
            'costo' => 'required|numeric|min:0.01',
            'data_inizio' => 'nullable|date',
            'data_fine' => 'nullable|date|after_or_equal:data_inizio',
            'cliente' => 'nullable|string|max:255',
            'indirizzo_lavoro' => 'nullable|string|max:255',
            'responsabile_lavoro' => 'nullable|string|max:255',
            'materiali' => 'nullable|string|max:255',
        ];
    }
    public function messages(){
        return[
            'titolo.required'  => 'Il titolo è obbligatorio.',
            'titolo.max'       => 'Il titolo non può superare :max caratteri.',
            'descrizione.required' => 'La descrizione è obbligatoria',
            'descrizione.max'   => 'La descrizione non può superare :max caratteri.',
            'costo.required' => 'Il campo costo è obbligatorio.',
            'costo.numeric' => 'Il campo costo deve essere un numero.',
            'costo.min' => 'Il campo costo deve essere almeno :min.',
            'data_inizio.date' => 'Il campo data inizio deve essere una data valida.',
            'data_fine.date' => 'Il campo data fine deve essere una data valida.',
            'data_fine.after_or_equal' => 'La data di fine deve essere uguale o successiva alla data di inizio.',
            'cliente.max' => 'Il campo cliente non può superare :max caratteri.',
            'indirizzo_lavoro.max' => 'Il campo indirizzo lavoro non può superare :max caratteri.',
            'responsabile_lavoro.max' => 'Il campo responsabile lavoro non può superare :max caratteri.',
            'materiali.max' => 'Il campo materiali non può superare :max caratteri.',
        ];
    }
}
