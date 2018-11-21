<?php

namespace App\Services\Leadership;

use App\Repositories\Leadership\LeadershipInterface;

class LeadershipService
{
    protected $leadershipRepo;

    public function __construct(LeadershipInterface $leadershipRepo)
    {
        $this->leadershipRepo = $leadershipRepo;
    }

    public function get($d)
    {
        return $this->leadershipRepo->getById($d);
    }

    public function getAll()
    {
        return $this->leadershipRepo->getAll();
    }

    public function create($data)
    {
        return $this->leadershipRepo->create($data);
    }

    public function delete($id)
    {
        $this->leadershipRepo->delete($id);
    }

    public function update($inst, $fields)
    {
        $inst->update($fields);
    }
}