<?php

namespace App\Services\User;


use App\Http\Controllers\ApiResponseController;
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

    public function login()
    {
        $credentials = request(['email', 'gov_id']);
        $credentials['gov_id'] = md5($credentials['gov_id']);

        $this->validateLogin($credentials);

        $user = User::where([
            'email' => $credentials['email'], 'gov_id' => $credentials['gov_id']
        ])->first();

        if ($user)
        {
            $token = JWTAuth::fromUser($user);

            return ApiResponseController::success($token);
        }

        return ApiResponseController::error('INVALID_CREDENTIALS');
    }

    public function register()
    {
        $request = request(['email', 'gov_id', 'name', 'phone', 'accepts_notifications']);
        $this->validateRegister($request);
        $user = $this->userRepo->register($request);
        $token = JWTAuth::fromUser($user);

        return ApiResponseController::success($token);
    }

    public function getAuthenticatedUser()
    {

        $user = JWTAuth::ParseToken()->authenticate();

        return ApiResponseController::success($user);
    }

    public function updateNotificationStatus()
    {
        $request = request(['status', 'push_notification_token']);

        $this->validateUpdateNotifications($request);

        if ($request['status'])
        {
            $user = JWTAuth::ParseToken()->authenticate();

            $this->userRepo->update($user, ['accepts_notifications' => Carbon::now()]);

            return ApiResponseController::success('UPDATED');
        }

        return ApiResponseController::error();
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

        if ($validator->fails()) {
            return ApiResponseController::error();
        }
    }

    private function validateLogin($request)
    {
        $validator = Validator::make($request, [
            'email' => 'required|string|max:75|unique:users',
            'gov_id' => 'required|unique:users'
        ]);

        if ($validator->fails())
        {
            return ApiResponseController::error();
        }
    }

    private function validateUpdateNotifications($request)
    {
        $validator = Validator::make($request, ['status' => 'required|boolean', 'push_notification_token' => 'required']);
        if ($validator->fails())
        {
            return ApiResponseController::error();
        }
    }
}