<?php

namespace App\Http\Controllers;

use App\Services\User\UserFacade;

class SessionController extends ApiResponseController
{
    public function register()
    {
        return UserFacade::register();
    }

    public function login()
    {
        return UserFacade::login();
    }

    public function getAuthenticatedUser()
    {
        return UserFacade::getAuthenticatedUser();
    }

    public function updateNotificationStatus()
    {
        return UserFacade::updateNotificationStatus();
    }

    public function getTerms()
    {
        self::success('Terms of use...');
    }
}
