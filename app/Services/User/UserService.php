<?php

namespace App\Services\User;


use App\Repositories\User\UserInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService
{
    protected $userRepo;

    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function get($id)
    {
        return $this->userRepo->get($id);
    }

    public function getAll()
    {
        return $this->userRepo->getAll();
    }

    public function register($request)
    {
        $user = $this->userRepo->register($request);
        $token = JWTAuth::fromUser($user);

        return $token;
    }

    public function login($credentials)
    {
        $user = User::where([
            'email' => $credentials['email'], 'gov_id' => md5($credentials['gov_id'])
        ])->first();

        $token = null;

        if ($user) {
            $token = JWTAuth::fromUser($user);
        }

        return $token;
    }

    public function getAuthenticatedUser()
    {
        $user = JWTAuth::ParseToken()->authenticate();

        return $user->get(['id', 'name', 'email', 'phone', 'accepts_notifications']);
    }

    public function updateNotificationStatus($request)
    {
        $reqStatus = $request['status'];

        if ($reqStatus) {
            $user = JWTAuth::ParseToken()->authenticate();
            $this->userRepo->update($user, ['accepts_notifications' => Carbon::now()]);
        }

        return $reqStatus;
    }

    public function validateRegister($request)
    {
        $validator = Validator::make($request, [
            'email' => 'required|string|max:75|unique:users',
            'gov_id' => 'required|unique:users',
            'name' => 'required|string|max:25',
            'phone' => 'required|numeric|unique:users|max:12',
            'accepts_notifications' => 'nullable|date'
        ]);

        return $validator->errors()->getMessages();
    }

    public function validateLogin($request)
    {
        $validator = Validator::make($request, [
            'email' => 'required|string|max:75|unique:users',
            'gov_id' => 'required|unique:users'
        ]);

        return $validator->errors()->getMessages();
    }

    public function validateUpdateNotifications($request)
    {
        $validator = Validator::make($request, ['status' => 'required|boolean', 'push_notification_token' => 'required']);

        return $validator->errors()->getMessages();
    }
}