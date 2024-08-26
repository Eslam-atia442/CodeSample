<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\BaseApiController;
use App\Http\Requests\api\ReservationRequest;
use App\Http\Resources\ClinicResource;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Services\ClinicService;
use App\Services\ReservationService;

/**
 * @group Api
 * @subgroup Reservation
 */
class ReservationController extends BaseApiController
{

    /**
     *  Reservation constructor.
     * @param ReservationService $service
     */

    public function __construct(ReservationService $service)
    {
        $this->service = $service;
        parent::__construct($service, ReservationResource::class);

    }

    //@queryParam filters[keyword] Filter by name , location

    /**
     * Reservation List
     *
     *
     *
     * @response {
     *  "status": 200,
     *  "message": "",
     *  "data":{
     *      "id":1,
     *   }
     * }
     *
     */
    public function index(): mixed
    {
        \request()->merge(['scope' => 'full','user' => auth()->id()]);
        $models = $this->service->search([], $this->relations);
        return $this->respondWithCollection($models);
    }


    /**
     * Create Reservation
     *
     *
     *
     * @response {
     *  "status": 200,
     *  "message": "",
     *  "data":{
     *      "id":1,
     *   }
     * }
     *
     */
    public function store(ReservationRequest $request): mixed
    {
        \request()->merge(['scope' => 'full']);

        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['reservation_number'] = rand(100000, 999999).'-'.now()->timestamp; ;
        $model = $this->service->create($data);
        return $this->respondWithModel($model);
    }


    /**
     * update Reservation
     *
     *
     *
     * @response {
     *  "status": 200,
     *  "message": "",
     *  "data":{
     *      "id":1,
     *   }
     * }
     *
     */
    public function update(ReservationRequest $request, Reservation $reservation): mixed
    {
        \request()->merge(['scope' => 'full']);
        $model = $this->service->update($reservation, $request->validated());
        return $this->respondWithModel($model);
    }


}
