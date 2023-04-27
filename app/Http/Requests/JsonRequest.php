<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class JsonRequest
 *
 * @package App\Http\Requests
 */
abstract class JsonRequest extends FormRequest
{
    /**
     * @var array
     */
    protected $acceptableContentTypes = [
        'application/json',
    ];

    /**
     * @return array
     */
    public function validationData()
    {
        return $this->json->all();
    }

    /**
     * @param \Illuminate\Contracts\Validation\Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
