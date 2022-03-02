<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GPUStoreRequest extends FormRequest
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
            'image' => 'required|string|max:150',
            'nom' => 'required|string|max:150',
            'frequence' => 'required|string|max:100',
            'frequence_boost' => 'required|string|max:150',
            'nb_coeur' => 'required|integer|digits:11',
            'nb_threads' => 'required|integer|digits:11',
            'nb_video_output' => 'required|integer|digits:11',
            'description' => 'sometimes|string|max:600'
        ];
    }
}
