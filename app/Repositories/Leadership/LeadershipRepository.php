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

    public function getById($leadershipId)
    {
        return $this->leadershipModel->find($leadershipId);
    }
}