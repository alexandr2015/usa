<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Symfony\Component\HttpFoundation\Response;

abstract class BaseRequest extends Request
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
    abstract public function rules();

    public function response(array $errors)
    {
        return response()->json([
            'errors' => $errors
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
