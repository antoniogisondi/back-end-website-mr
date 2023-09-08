<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkRequest extends FormRequest
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
            'img-1' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'img-2' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'img-3' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'img-4' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages(){
        return[
            'titolo.required'  => 'Il titolo è obbligatorio.',
            'titolo.max'       => 'Il titolo non può superare :max caratteri.',
            'descrizione.required' => 'La descrizione è obbligatoria',
            'descrizione.max'   => 'La descrizione non può superare :max caratteri.',
            'img-1.mimes' => 'Il formato dell\'immagine non è valido. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
            'img-1' => 'Il tipo di file non è consentito. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
            'img-2.mimes' => 'Il formato dell\'immagine non è valido. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
            'img-2' => 'Il tipo di file non è consentito. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
            'img-3.mimes' => 'Il formato dell\'immagine non è valido. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
            'img-3' => 'Il tipo di file non è consentito. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
            'img-4.mimes' => 'Il formato dell\'immagine non è valido. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
            'img-4' => 'Il tipo di file non è consentito. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
        ];
    }
}
