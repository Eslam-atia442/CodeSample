<?php

namespace App\Services;

use App\Repositories\Contracts\BaseContract;
use App\Repositories\Contracts\ReservationContract;

class ReservationService extends BaseService
{

    protected BaseContract $repository;

    public function __construct(ReservationContract $repository)
    {
        $this->repository = $repository;
        parent::__construct($repository);
    }


}
