<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuardian extends FormRequest
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
            'f_initials' =>         'required_without_all:m_initials,g_initials|max:100',
            'f_surname' =>          'nullable|max:100',
            'f_contact_no' =>       'nullable|max:15',
            'f_occupation' =>       'nullable|max:100',
            'f_work_place' =>       'nullable|max:100',
            'm_initials' =>         'nullable|max:100',
            'm_surname' =>          'nullable|max:100',
            'm_contact_no' =>       'nullable|max:100',
            'm_occupation' =>       'nullable|max:100',
            'm_work_place' =>       'nullable|max:100',
            'g_initials' =>         'nullable|max:100',
            'g_surname' =>          'nullable|max:100',
            'g_contact_no' =>       'nullable|max:100',
            'is_old_boy' =>         'nullable|boolean',
            'total_donations' =>    'nullable|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'f_initials.required_without_all' => 'Initials of Father, Mother or Guardian should be provided.',
            'm_initials.required_without_all' => 'Initials of Father, Mother or Guardian should be provided.',
            'g_initials.required_without_all' => 'Initials of Father, Mother or Guardian should be provided.',
        ];
    }
}
