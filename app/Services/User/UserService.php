<?php

namespace App\Services\User;


use App\Repositories\User\UserInterface;
use App\User;
use App\Exceptions\CustomResponse;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class UserService
{
    protected $userRepo;

    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login()
    {
        $credentials = request(['email', 'gov_id']);

        $credentials['gov_id'] = md5($credentials['gov_id']);

        $user = new User();

        $user->where([
            'email' => $credentials['email'], 'gov_id' => $credentials['gov_id']
        ])->get();

        if ($user)
        {
            if (!$token = JWTAuth::fromUser($user))

            return $this->userRepo->login($credentials, $token);
        }

        return CustomResponse::response('INVALID_CREDENTIALS');
    }

    public function register()
    {
        $request = request(['email', 'gov_id', 'name', 'phone']);

        $validator = Validator::make($request, [
            'email' => 'required|string|max:255|unique:users',
            'gov_id' => 'required',
            'name' => 'required|string|max:255',
            'phone' => 'required'
        ]);

//        dd($validator);

        if ($validator->fails()) {
            return CustomResponse::response('AUTH_ERROR');
        }

        return $this->userRepo->register($request);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::ParseToken()->authenticate())
            {
                return CustomResponse::response('USER_NOT_FOUND');
            }

        } catch (\Exception $exception) {

            return CustomResponse::response();
        }

        return $this->userRepo->getUser($user);
    }

    public function updateNotificationStatus()
    {
        $request = request(['status', 'push_notification_token']);

        $validator = Validator::make($request, ['status' => 'required'|'boolean']);

        if ($validator->fails()) {
            return CustomResponse::response();
        }

        if ($request['status'])
        {
            if (!$user = JWTAuth::ParseToken()->authenticate())
            {
                return CustomResponse::response('USER_NOT_FOUND');
            }

            return $this->userRepo->updateNotificationStatus($user);
        }

        return $this->userRepo->updateNotificationStatus($request);
    }
}