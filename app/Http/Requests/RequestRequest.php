<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRequest extends FormRequest
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
        $method = $this->method();

        switch ($method) {
            case 'POST':
                return [
                    'subject' => 'required',
                    'specialization' => 'required',
                    'work_experience' => 'required|integer',
                    'education' => 'required',
                    'work_field' => 'required',
                    'reference_name' => 'required',
                    'reference_position' => 'required',
                    'reference_email' => 'required|email',
                    'reference_contact' => 'required',
                    'message' => 'required',
                    'file' => 'mimes:jpg,png',
                    'reason' => 'nullable|string'
                ];
            case 'PUT':
                return [
                    'subject' => 'required',
                    'specialization' => 'required',
                    'work_experience' => 'required|integer',
                    'education' => 'required',
                    'work_field' => 'required',
                    'reference_name' => 'required',
                    'reference_position' => 'required',
                    'reference_email' => 'required|email',
                    'reference_contact' => 'required',
                    'message' => 'required',
                    'file' => 'mimes:jpg,png',
                    'reason' => 'nullable|string'
                ];
        }
    }
}
