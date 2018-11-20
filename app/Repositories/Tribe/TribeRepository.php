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

    public function getById($tribeId)
    {
        return $this->tribeModel->find($tribeId);
    }
}