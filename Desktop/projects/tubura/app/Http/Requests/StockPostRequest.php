<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockPostRequest extends FormRequest
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
            'season_id' => [
                'required',
            ],
            'initial_amount' => [
                'required',
            ],
            'current_amount' => [
                'required',
            ],
            'seed_id' => [
                'required',
            ],
            'fertilizer_id' => [
                'required',
            ],
        ];
    }
}
