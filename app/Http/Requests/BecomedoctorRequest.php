<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BecomedoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust the authorization logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'medical_license' => 'required|string',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules for file upload
        ];
    }
}

