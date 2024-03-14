<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
                    'department_name' => 'required',
                    'description' => 'required',
                    'file' => 'required|mimes:jpg,png',
                    'code' => 'required|unique:departments,code|string'
                ];
            case 'PUT':
                return [
                    'department_name' => 'required',
                    'description' => 'required',
                    'file' => 'mimes:jpg,png',
                    'code' => 'required|string|unique:departments,code,' . $this->department                
                ];
        }
    }
}
