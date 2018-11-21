<?php

namespace App\Services\User;


use App\Repositories\User\UserInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
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

    public function login()
    {
        $credentials = request(['email', 'gov_id']);
        $credentials['gov_id'] = md5($credentials['gov_id']);

        $valErr = $this->validateLogin($credentials);
        if ((bool) $valErr) {

            return ['error', $valErr];
        }

        $user = User::where([
            'email' => $credentials['email'], 'gov_id' => $credentials['gov_id']
        ])->first();

        if ($user) {
            $token = JWTAuth::fromUser($user);

            return ['data', $token];
        }

        return ['error', 'GENERAL_ERROR'];
    }

    public function register()
    {
        $request = request(['email', 'gov_id', 'name', 'phone', 'accepts_notifications']);
        $valErr = $this->validateRegister($request);
        if ((bool) $valErr) {

            return ['error', $valErr];
        }

        $user = $this->userRepo->register($request);
        $token = JWTAuth::fromUser($user);

        return ['data', $token];
    }

    public function getAuthenticatedUser()
    {
        $user = JWTAuth::ParseToken()->authenticate();

        return ['data', $user];
    }

    public function updateNotificationStatus()
    {
        $request = request(['status', 'push_notification_token']);
        $valErr = $this->validateUpdateNotifications($request);
        if ((bool) $valErr) {

            return ['error', $valErr];
        }

        if ($request['status']) {
            $user = JWTAuth::ParseToken()->authenticate();
            $this->userRepo->update($user, ['accepts_notifications' => Carbon::now()]);

            return ['data', 'UPDATED'];
        }

        return ['error', 'GENERAL_ERROR'];
    }

    private function validateRegister($request)
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

    private function validateLogin($request)
    {
        $validator = Validator::make($request, [
            'email' => 'required|string|max:75|unique:users',
            'gov_id' => 'required|unique:users'
        ]);

        return $validator->errors()->getMessages();
    }

    private function validateUpdateNotifications($request)
    {
        $validator = Validator::make($request, ['status' => 'required|boolean', 'push_notification_token' => 'required']);

        return $validator->errors()->getMessages();
    }
}