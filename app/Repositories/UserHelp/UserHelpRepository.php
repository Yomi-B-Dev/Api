<?php

namespace App\Repositories\UserHelp;

use App\Models\Entities\UserHelp;
use Illuminate\Database\Eloquent\Model;

class UserHelpRepository implements UserHelpInterface
{
    protected $userHelpModel;

    public function __construct(Model $userHelp)
    {
        $this->userHelpModel = $userHelp;
    }

    public function create($data)
    {
        $this->userHelpModel->create($data);
    }

    public function getById($guestHelpId)
    {
        return $this->userHelpModel->find($guestHelpId);
    }

    public function getAll()
    {
        return $this->userHelpModel->all('question', 'answer');
    }

    public function update($inst, $fields)
    {
        $inst->update($fields);
    }
}
