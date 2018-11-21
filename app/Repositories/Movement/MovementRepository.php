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

    public function getById($id)
    {
        return $this->movementModel->find($id);
    }

    public function getAll()
    {
        return $this->movementModel->all();
    }

    public function create($data)
    {
        return $this->movementModel->create($data);
    }

    public function delete($id)
    {
        $this->movementModel->destroy($id);
    }

    public function update($inst, $fields)
    {
        $inst->update($fields);
    }
}