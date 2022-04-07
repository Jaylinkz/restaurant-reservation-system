<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerStoreRequest extends FormRequest
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
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed'],
                'employee_id' => ['required', 'string', 'max:15', 'unique:users'], 
                'image'=>['required','image'],
                ])//
        ];
    }
}
