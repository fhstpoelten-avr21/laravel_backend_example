<?php

namespace App\Http\Controllers;

use App\Contracts\PassengerServiceInterface;
use App\Services\PassengerService;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class PassengerController extends Controller
{
    protected PassengerService $passengerService;

    /**
     * PassengerController constructor.
     */
    public function __construct()
    {
        $this->passengerService = resolve(PassengerServiceInterface::class);
    }

    /**
     * Display a listing of the resource and filter by airline
     *
     * @param int|null $airlineId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(?int $airlineId = null): \Illuminate\Http\JsonResponse
    {
        try {
            $page = request()->get('page') ?: null;
            $size = request()->get('size') ?: 50;

            /** @var \Illuminate\Support\Collection $passengers */
            $passengers = $this->passengerService->getAll($airlineId, $page, $size);

            return response()->json($passengers)->setStatusCode(200);
        } catch (\Throwable $exception) {
            Log::error($exception);

            return response()->json()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
