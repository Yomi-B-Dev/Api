<?php

namespace App\Repositories\Leadership;

use Illuminate\Database\Eloquent\Model;

class LeadershipRepository implements LeadershipInterface
{
    protected $leadershipModel;

    public function __construct(Model $leadership)
    {
        $this->leadershipModel = $leadership;
    }

    public function getById($id)
    {
        return $this->leadershipModel->find($id);
    }

    public function getAll()
    {
        return $this->leadershipModel->all();
    }

    public function create($data)
    {
        return $this->leadershipModel->create($data);
    }

    public function delete($id)
    {
        $this->leadershipModel->destroy($id);
    }

    public function update($inst, $fields)
    {
        $inst->update($fields);
    }
}