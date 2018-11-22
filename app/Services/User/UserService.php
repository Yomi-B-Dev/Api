<?php

namespace App\Services\User;


use App\Repositories\User\UserInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;

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
        $user = User::where($credentials)
            ->first();

        $token = null;

        if ($user) {
            $token = JWTAuth::fromUser($user);
        }

        return $token;
    }

    public function getAuthenticatedUser()
    {
        $user = JWTAuth::ParseToken()->authenticate();

        return $user->only(['id', 'name', 'email', 'phone', 'accepts_notifications']);
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
            'email' => 'required|email|max:75|unique:users',
            'gov_id' => 'required|unique:users',
            'name' => 'required|string|max:25',
            'phone' => 'required|numeric|unique:users',
            'accepts_notifications' => 'nullable|date'
        ]);

        return $validator->errors()->getMessages();
    }

    public function validateLogin($request)
    {
        $validator = Validator::make($request, [
            'email' => 'required|email|max:75',
            'gov_id' => 'required'
        ]);

        return $validator->errors()->getMessages();
    }

    public function validateUpdateNotifications($request)
    {
        $validator = Validator::make($request, ['status' => 'required|boolean', 'push_notification_token' => 'required']);

        return $validator->errors()->getMessages();
    }
}
