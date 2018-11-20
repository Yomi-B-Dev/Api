<?php

namespace App\Repositories\Movement;

use Illuminate\Database\Eloquent\Model;

class MovementRepository implements MovementInterface
{
    protected $movementModel;

    public function __construct(Model $movement)
    {
        $this->movementModel = $movement;
    }

    public function getById($movementId)
    {
        return $this->movementModel->find($movementId);
    }
}