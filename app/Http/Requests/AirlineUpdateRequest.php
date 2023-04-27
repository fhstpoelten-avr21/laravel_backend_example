<?php

namespace App\Http\Requests;

/**
 * Class AirlineUpdateRequest
 *
 * @package App\Http\Requests
 */
class AirlineUpdateRequest extends JsonRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'country' => 'nullable|string',
            'logo' => 'nullable|string',
            'slogan' => 'nullable|string',
            'head_quaters' => 'nullable|string',
            'website' => 'nullable|string',
            'established' => 'nullable|string',
        ];
    }
}
