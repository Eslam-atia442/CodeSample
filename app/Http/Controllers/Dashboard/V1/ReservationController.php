<?php

namespace App\Http\Controllers\Dashboard\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Services\ReservationService;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * @group Dashboard
 * @subgroup Reservation
 */

class ReservationController extends BaseApiController
{
     /**
        * ReservationController constructor.
        * @param ReservationService $service
        */


       public function __construct(ReservationService $service)
       {
           $this->service = $service;
           parent::__construct($service, ReservationResource::class);
       }

    /**
     * Store a newly created resource in storage.
     * @param ReservationRequest $request
     * @return JsonResponse
     */
    public function store(ReservationRequest $request): JsonResponse
    {
        try {
            $reservation = $this->service->create($request->validated());
            return $this->respondWithModel($reservation->load($this->relations));
        }catch (Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
    }
   /**
    * Display the specified resource.
    * @param Reservation $reservation
    * @return JsonResponse
    */
   public function show(Reservation $reservation): JsonResponse
   {
       try {
           return $this->respondWithModel($reservation->load($this->relations));
       }catch (Exception $e) {
           return $this->respondWithError($e->getMessage());
       }
   }
    /**
     * Update the specified resource in storage.
     *
     * @param ReservationRequest $request
     * @param Reservation $reservation
     * @return JsonResponse
     */
    public function update(ReservationRequest $request, Reservation $reservation) : JsonResponse
    {
        try {
            $reservation = $this->service->update($reservation, $request->validated());
            return $this->respondWithModel($reservation->load($this->relations));
        }catch (Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     * @param Reservation $reservation
     * @return JsonResponse
     */
    public function destroy(Reservation $reservation): JsonResponse
    {
        try {
            $this->service->remove($reservation);
            return $this->respondWithSuccess(__('messages.deleted'));
        }catch (Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
    }

    /**
     * active & inactive the specified resource from storage.
     * @param Reservation $reservation
     * @return JsonResponse
     */
    public function changeActivation(Reservation $reservation): JsonResponse
    {
        try {
            $this->service->toggleField($reservation, 'is_active');
            return $this->respondWithModel($reservation->load($this->relations));
        }catch (Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
    }
}
