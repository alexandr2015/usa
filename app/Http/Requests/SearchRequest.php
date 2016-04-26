<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SearchRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'day_from' => 'required|date|before:' . $this->get('day_to'),
            'day_to' => 'required|date',
        ];
    }
}
