<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirlineCreateRequest;
use App\Http\Requests\AirlineUpdateRequest;
use App\Models\Airline;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            return response()->json(Airline::all())->setStatusCode(Response::HTTP_OK);
        } catch (\Throwable $exception) {
            Log::error($exception);

            return response()->json()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(): \Illuminate\Http\JsonResponse
    {
        return response()->json()->setStatusCode(Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\AirlineCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AirlineCreateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $airline = new Airline(array_filter($request->all()));
            $airline->save();

            return response()->json($airline)->setStatusCode(Response::HTTP_CREATED);
        } catch (\Throwable $exception) {
            Log::error($exception);

            return response()->json()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $airline = Airline::findOrFail($id);

            return response()->json($airline)->setStatusCode(Response::HTTP_OK);
        } catch (ModelNotFoundException $exception) {
            return response()->json()->setStatusCode(Response::HTTP_NOT_FOUND);
        } catch (\Throwable $exception) {
            Log::error($exception);

            return response()->json()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(int $id): \Illuminate\Http\JsonResponse
    {
        return response()->json()->setStatusCode(Response::HTTP_NOT_IMPLEMENTED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\AirlineUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AirlineUpdateRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        try {
            /** @var Airline $airline */
            $airline = Airline::findOrFail($id);

            $airline->name = $id ?: ($request->get('name') ?: $airline->id);
            $airline->country = $request->get('country') ?: $airline->country;
            $airline->logo = $request->get('logo') ?: $airline->logo;
            $airline->slogan = $request->get('slogan') ?: $airline->slogan;
            $airline->head_quaters = $request->get('head_quaters') ?: $airline->head_quaters;
            $airline->website = $request->get('website') ?: $airline->website;
            $airline->save();

            return response()->json($airline)->setStatusCode(Response::HTTP_CREATED);
        } catch (ModelNotFoundException $exception) {

            return response()->json()->setStatusCode(Response::HTTP_NOT_FOUND);
        } catch (\Throwable $exception) {
            Log::error(config('app.name').'::'.$exception->getMessage());

            return response()->json()->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        return response()->json()->setStatusCode(Response::HTTP_NOT_IMPLEMENTED);
    }
}
