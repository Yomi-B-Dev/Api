<?php

namespace App\Services\UserHelp;

use App\Http\Controllers\ApiResponseController;
use App\Repositories\UserHelp\UserHelpInterface;
use Illuminate\Support\Facades\Validator;

class UserHelpService
{
    protected $userHelpRepo;

    public function __construct(UserHelpInterface $userHelpRepo)
    {
        $this->userHelpRepo = $userHelpRepo;
    }

    public function create()
    {
        $req = request()->all();
        $this->validateCreate($req);
        return $this->userHelpRepo->create($req);
    }

    public function get($userHelpId)
    {
        return $this->userHelpRepo->getById($userHelpId);
    }

    public function getAll()
    {
        return $this->userHelpRepo->getAll();
    }

//    public function update($row, $fields)
//    {
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