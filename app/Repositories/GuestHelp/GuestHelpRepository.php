<?php

namespace App\Repositories\GuestHelp;

use App\Models\Entities\GuestHelp;
use Illuminate\Database\Eloquent\Model;

class GuestHelpRepository implements GuestHelpInterface
{
    protected $guestHelpModel;

    public function __construct(Model $guestHelp)
    {
        $this->guestHelpModel = $guestHelp;
    }

    public function create($data)
    {
        return GuestHelp::create($data);
    }

    public function getById($guestHelpId)
    {
        return $this->guestHelpModel->find($guestHelpId);
    }

    public function getAll()
    {
        return $this->guestHelpModel->all();
    }

    public function update($row, $fields)
    {
        $row->update($fields);
    }
}