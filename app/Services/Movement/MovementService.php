<?php

namespace App\Services\Movement;

use App\Repositories\Movement\MovementInterface;

class MovementService
{
    protected $movementRepo;

    public function __construct(MovementInterface $movementRepo)
    {
        $this->movementRepo = $movementRepo;
    }

    public function get($movementId)
    {
        return $this->movementRepo->getById($movementId);
    }
}