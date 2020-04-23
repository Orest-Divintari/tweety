<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $profileUser = $this->route('user');
        return $this->user()->can('update', $profileUser);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['string', 'alpha_dash', 'required', 'max:255', Rule::unique('users')->ignore($this->user())],
            'name' => ['string', 'required', 'max:255'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($this->user())],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],
            'avatar' => ['file', 'nullable']
            //
        ];
    }
}