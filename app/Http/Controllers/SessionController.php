<?php

namespace App\Http\Controllers;

use App\Services\User\UserService;

class SessionController extends Controller
{
    public function register(UserService $userService)
    {
        return $userService->register();
    }

    public function login(UserService $userService)
    {
        return $userService->login();
    }

    public function getAuthenticatedUser(UserService $userService)
    {
        return $userService->getAuthenticatedUser();
    }

    public function updateNotificationStatus(UserService $userService)
    {
        return $userService->updateNotificationStatus();
    }
}
