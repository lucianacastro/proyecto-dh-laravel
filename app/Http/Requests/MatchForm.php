<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchForm extends FormRequest
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
            'title' => 'required|max:45',
            'field' => 'required|max:45',
            'number_of_players' => 'required|max:22',
            'date' => 'required|date',
        ];
    }
    
    public function messages()
    {
        return [
        'title.required' => 'El campo title es requerido!',
        'field.required' => 'El campo field es requerido!',
        'number_of_players.required' => 'El campo number_of_players es requerido!',
        'number_of_players.max' => 'El campo number_of_players no puede ser mayor a 22!',
        'date.required' => 'El campo date es requerido!',
        'date.date' => 'El campo date debe ser de formato fecha!',
        ];
    }
}
