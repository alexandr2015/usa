<?php

namespace App\Http\Requests;


class RulesRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @throws \Exception
     */
    public function rules()
    {
        $method = $this->method();
        if ($method == 'POST') {
            return $this->createRules();
        } else {
            throw new \Exception('Implement in future');
        }
    }

    public function createRules()
    {
        return [
            'weekdays' => 'required', //
            'location' => 'required|in:0,1',
            'state_id' => 'required_if:location,0|integer|exists:states,id',
            'timezone_id' => 'required_if:location,1|integer|exists:timezones,id',
            'all_year' => 'required|boolean',
            'dates' => 'array|dates_array',
        ];
    }
}
