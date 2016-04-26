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
            return $this->createRules();
        } elseif ($method == "GET") {
            return $this->updateRules();
        }

    }

    public function createRules()
    {
        return [
            'name' => 'required|string|unique:states',
        ];
    }

    public function updateRules()
    {
        return [
            'name' => 'required|string|unique:states,name,' . $this->segment(3),
        ];
    }
}
