<?php

namespace App\Http\Requests;

class StateRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->method();
        if ($method == 'POST') {
            return $this->createState();
        } elseif ($method == "GET") {
            return $this->updateState();
        }

    }

    public function createState()
    {
        return [
            'name' => 'required|string|unique:states',
        ];
    }

    public function updateState()
    {
        return [
            'name' => 'required|string|unique:states,name,' . $this->segment(3),
        ];
    }
}
