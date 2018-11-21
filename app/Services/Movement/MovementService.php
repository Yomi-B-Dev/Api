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

    public function get($d)
    {
        return $this->movementRepo->getById($d);
    }

    public function getAll()
    {
        return $this->movementRepo->getAll();
    }

    public function create($data)
    {
        return $this->movementRepo->create($data);
    }

    public function delete($id)
    {
        $this->movementRepo->delete($id);
    }

    public function update($inst, $fields)
    {
        $inst->update($fields);
    }
}