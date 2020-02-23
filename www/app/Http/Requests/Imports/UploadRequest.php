<?php

namespace App\Http\Requests\Imports;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UploadRequest
 * @package App\Http\Requests\Imports
 */
class UploadRequest extends FormRequest
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
            'file' => 'required|mimes:csv,txt'
        ];
    }
}
