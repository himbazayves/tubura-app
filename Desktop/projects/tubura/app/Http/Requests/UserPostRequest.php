<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
            'name' => [
                'required',
            ],
            'surname' => [
                'present',
            ],
            'phone_number' => [
                'present',
            ],
            'cell_id' => [
                'present',
            ],
            'is_admin' => [
                'required',
            ],
            'email' => [
                'required',
            ],
            'email_verified_at' => [
                'present',
            ],
            'password' => [
                'required',
            ],
            'two_factor_secret' => [
                'present',
            ],
            'two_factor_recovery_codes' => [
                'present',
            ],
            'remember_token' => [
                'present',
            ],
            'current_team_id' => [
                'present',
            ],
            'profile_photo_path' => [
                'present',
            ],
        ];
    }
}
