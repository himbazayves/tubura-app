<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FertilizerRequestPostRequest extends FormRequest
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
            'farmer_id' => [
                'required',
            ],
            'fertilizer_id' => [
                'required',
            ],
            'requested_amount' => [
                'required',
            ],
           
            
            'fertilizer_application_id' => [
                'required',
            ],
        ];
    }
}
