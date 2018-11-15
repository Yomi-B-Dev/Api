<?php

namespace App\Repositories\User;

use App\User;
use App\Exceptions\CustomResponse;
use Carbon\Carbon;
use JWTAuth;

class UserRepository implements UserInterface
{
    protected $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function register($request)
    {
//        $request['gov_id'] = md5($request['gov_id']);
//        dd($request);
//        $user = User::create($request);

        $user = User::create([
            'email' => $request['email'],
            'gov_id' => md5($request['gov_id']),
            'name' => $request['name'],
            'phone' => $request['phone']
            ]);

        $token = JWTAuth::fromUser($user);

        return CustomResponse::response($token, 'data');
    }

    public function login($credentials, $token)
    {
//        dd($credentials);
        return CustomResponse::response($token, 'data');
    }

    public function updateNotificationStatus($user)
    {
        $user ->update(['accepts_notifications' => Carbon::now()]);

        return CustomResponse::response();
    }

    public function getUser($user)
    {
        return CustomResponse::response($user);
    }

//    public function getHelp()
//    {
//
//    }


}