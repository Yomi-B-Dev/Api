<?php

namespace App\Services\GuestHelp;

use App\Http\Controllers\ApiResponseController;
use App\Repositories\GuestHelp\GuestHelpInterface;
use Illuminate\Support\Facades\Validator;

class GuestHelpService
{
    protected $guestHelpRepo;

    public function __construct(GuestHelpInterface $guestHelpRepo)
    {
        $this->guestHelpRepo = $guestHelpRepo;
    }

    public function create()
    {
        $req = request()->all();
        $this->validateCreate($req);
        return $this->guestHelpRepo->create($req);
    }

    public function get($guestHelpId)
    {
        return $this->guestHelpRepo->getById($guestHelpId);
    }

    public function getAll()
    {
        return $this->guestHelpRepo->getAll();
    }

//    public function update()
//    {
//        $req = request()->all();
//        $row = GuestHelp::
//        $row->update($fields);
//    }

    private function validateCreate($req)
    {
        $validator = Validator::make($req, [
            'question' => 'required|string|max:75|unique:users',
            'answer' => 'required|string|max:75|unique:users'
        ]);

        if ($validator->fails())
        {
            return ApiResponseController::error();
        }
    }
}