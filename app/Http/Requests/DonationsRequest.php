<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required',
            'donation' => 'required',
            'message' => 'min:3|required',
        ];
    }
}
