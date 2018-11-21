<?php

namespace App\Repositories\Tribe;

use Illuminate\Database\Eloquent\Model;

class TribeRepository implements TribeInterface
{
    protected $tribeModel;

    public function __construct(Model $tribe)
    {
        $this->tribeModel = $tribe;
    }

    public function getById($id)
    {
        return $this->tribeModel->find($id);
    }

    public function getAll()
    {
        return $this->tribeModel->all();
    }

    public function create($data)
    {
        return $this->tribeModel->create($data);
    }

    public function delete($id)
    {
        $this->tribeModel->destroy($id);
    }

    public function update($inst, $fields)
    {
        $inst->update($fields);
    }
}