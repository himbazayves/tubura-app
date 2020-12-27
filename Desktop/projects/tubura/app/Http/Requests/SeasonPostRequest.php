<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'start' => [
                'required',
            ],
            'year_id' => [
                'required',
            ],
            'season_type_id' => [
                'required',
            ],
            'end' => [
                'required',
            ],
        ];
    }
}
