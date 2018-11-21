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

    public function get($d)
    {
        return $this->tribeRepo->getById($d);
    }

    public function getAll()
    {
        return $this->tribeRepo->getAll();
    }

    public function create($data)
    {
        return $this->tribeRepo->create($data);
    }

    public function delete($id)
    {
        $this->tribeRepo->delete($id);
    }

    public function update($inst, $fields)
    {
        $inst->update($fields);
    }
}