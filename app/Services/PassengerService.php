<?php

namespace App\Services;

use App\Contracts\PassengerRequestInterface;
use App\Contracts\PassengerServiceInterface;
use App\Models\Passenger;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Class PassengerService
 *
 * @package App\Services
 */
class PassengerService implements PassengerServiceInterface
{
    protected RequestService $passengerRequest;

    /**
     * PassengerService constructor.
     */
    public function __construct()
    {
        $this->passengerRequest = resolve(PassengerRequestInterface::class);
    }

    /**
     * @param int|null $airlineId
     * @param int|null $page
     * @param int|null $size
     * @return \Illuminate\Support\Collection
     */
    public function getAll(?int $airlineId = null, ?int $page = null, ?int $size = null): Collection
    {
        // Fetch passengers from API and map it to a not persistent model - and cache it
        $passengers = Cache::remember(
            config('cache.prefix').'/passengers/'.($airlineId?:0).'/page='.$page.'/size='.$size,
            config('cache.ttl.passengers'),
            function () use ($page, $size) {
                return $page ? $this->passengerRequest->get('?page='.$page.'&size='.$size) : ($size ? $this->passengerRequest->get('?size='.$size) : $this->passengerRequest->get('/'));
            });

        $collection = collect($passengers['data'])->map(function ($passenger) {
            $airlineId = array_key_exists('airline', $passenger) && array_key_exists('id', $passenger['airline']) ? $passenger['airline']['id'] : null;

            return new Passenger($passenger, $airlineId);
        });

        return !$airlineId ? $collection : $collection->where('airline.id', $airlineId);
    }
}
