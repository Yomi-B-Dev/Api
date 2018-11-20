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

    public function get($leadershipId)
    {
        return $this->leadershipRepo->getById($leadershipId);
    }
}