<?php

namespace App\Http\Controllers;

use App\Services\User\UserFacade;

class SessionController extends ApiResponseController
{
    public function register()
    {
        return $this->jsonResponse(UserFacade::register());
    }

    public function login()
    {
        return $this->jsonResponse(UserFacade::login());
    }

    public function getAuthenticatedUser()
    {

        return $this->jsonResponse(UserFacade::getAuthenticatedUser());
    }

    public function updateNotificationStatus()
    {
        return $this->jsonResponse(UserFacade::updateNotificationStatus());
    }

    public function getTerms()
    {
        $this->jsonResponse(['data', 'Terms of use...']);
    }
}
