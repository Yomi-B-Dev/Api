<?php

namespace App\Http\Controllers\Session;

use App\Services\User\UserFacade;
use App\Http\Controllers\ApiResponse\ApiResponseController;

class SessionController extends ApiResponseController
{
    public function register()
    {
        $request = request(['gov_id', 'email', 'phone', 'name', 'accepts_notifications']);
        $request['gov_id'] = md5($request['gov_id']);

        $validatorErrors = UserFacade::validateRegister($request);
        if ((bool)$validatorErrors) {

            return $this->error($validatorErrors);
        }

        return $this->success(UserFacade::register($request));
    }

    public function login()
    {
        $request = request(['email', 'gov_id']);
        $request['gov_id'] = md5($request['gov_id']);

        $validatorErrors = UserFacade::validateLogin($request);

        if ((bool)$validatorErrors) {

            return $this->error($validatorErrors);
        }

        $token = UserFacade::login($request);
        if ($token) {

            return $this->success($token);
        }

        return $this->error('INVALID_CREDENTIALS');
    }

    public function getAuthenticatedUser()
    {
        return $this->success(UserFacade::getAuthenticatedUser());
    }

    public function updateNotificationStatus()
    {
        $request = request(['status', 'push_notification_token']);
        $validatorErrors = UserFacade::validateUpdateNotifications($request);

        if ((bool)$validatorErrors) {

            return $this->error($validatorErrors);
        }

        $status = UserFacade::updateNotificationStatus($request);
        if ($status) {

            return $this->success('UPDATED');
        }

        return $this->error('GENERAL_ERROR');

    }
}
