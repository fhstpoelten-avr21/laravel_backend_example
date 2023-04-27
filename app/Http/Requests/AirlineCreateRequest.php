<?php

namespace App\Http\Requests;

/**
 * Class AirlineCreateRequest
 *
 * @package App\Http\Requests
 */
class AirlineCreateRequest extends JsonRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|int|unique:airlines',
            'name' => 'string|unique:airlines',
            'country' => 'nullable|string',
            'logo' => 'nullable|string',
            'slogan' => 'nullable|string',
            'head_quaters' => 'nullable|string',
            'website' => 'nullable|string',
            'established' => 'nullable|string',
        ];
    }
}
