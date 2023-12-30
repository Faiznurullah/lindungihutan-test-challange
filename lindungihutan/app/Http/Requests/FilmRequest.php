<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255', 
            'artis' => 'required|string|max:255', 
            'produser' => 'required|string|max:255', 
            'income' => 'required|numeric',  
            'nomination' => 'required|numeric',  
        ];
    }
}
