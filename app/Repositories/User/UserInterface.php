<?php

namespace App\Repositories\User;

interface UserInterface
{
    public function updateNotificationStatus($data);
    public function register($data);
    public function login($data, $token);
    public function getUser($data);
//    public function getHelp();
//    public function getQuestionsAnswers();
}