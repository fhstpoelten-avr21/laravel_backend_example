<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

/**
 * Interface PassengerServiceInterface
 *
 * @package App\Contracts
 */
interface PassengerServiceInterface
{
    /**
     * @param int|null $airlineId
     * @param int|null $page
     * @param int|null $size
     * @return \Illuminate\Support\Collection
     */
    public function getAll(?int $airlineId = null, ?int $page = null, ?int $size = null): Collection;
}
