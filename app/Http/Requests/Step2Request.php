<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Config;

class Step2Request extends Request
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
            'subject' => 'required|min:3',
            'number_groups' => 'required|numeric|digits_between:' . Config::get('formatter.minGroups') . ',' . Config::get('formatter.maxGroups'),
            'assignment_type' => 'required|in:0,1,2',
            'allow_group_changes' => 'required|in:0,1',
            'change_type' => 'required_if:allow_group_changes,1',
            'max_date' => 'required_if:allow_group_changes,1',
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'Por favor, introduzca un archivo con los formatos :values.',
            'number_groups.required' => 'Por favor, introduzca un archivo con los formatos.',
            'assignment_type.required' => 'Por favor, introduzca un archivo con los formatos.',
        ];
    }
}
