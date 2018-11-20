<?php

namespace App\Services\Tribe;

use App\Repositories\Tribe\TribeInterface;

class TribeService
{
    protected $tribeRepo;

    public function __construct(TribeInterface $tribeRepo)
    {
        $this->tribeRepo = $tribeRepo;
    }

    public function get($tribeId)
    {
        return $this->tribeRepo->getById($tribeId);
    }
}