<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Step1Request extends Request
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
            'file' => 'required_without_all:table_row|mimes:xls,xlms,xlsx',
            'table_row' => 'required_without_all:file'
        ];
    }

    public function messages()
    {
        return [
            'file.mimes' => 'Por favor, introduzca un archivo con los formatos :values.',
            'file.required_without_all' => 'Por favor, introduzca un archivo con los formatos.',
            'table_row.required_without_all' => 'Por favor, introduzca un archivo con los formatos.',
        ];
    }
}
