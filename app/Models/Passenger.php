<?php

namespace App\Models;

use Jenssegers\Model\Model;

/**
 * Class Passenger
 * Non-persistent model
 *
 * @property string id
 * @property string name
 * @property int trips
 * @property \App\Models\Airline airline
 * @package App\Models
 */
class Passenger extends Model
{
    public function __construct(array $attributes = [], ?int $airlineId = null)
    {
        parent::__construct($attributes);
        $this->airline = $airlineId ? Airline::find($airlineId) : new Airline();
    }

    /**
     * Get the airline that owns the passenger.
     */
    public function airline()
    {
        return $this->airline;
    }
}
