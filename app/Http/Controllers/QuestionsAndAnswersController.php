<?php

namespace App\Http\Controllers;

use App\Services\GuestHelp\GuestHelpFacade;
use App\Services\UserHelp\UserHelpFacade;

class QuestionsAndAnswersController extends ApiResponseController
{
    public function getQuestionsAnswersUser()
    {
        return $this->success(UserHelpFacade::getAll());
    }

    public function getQuestionsAnswersGuest()
    {
        return $this->success(GuestHelpFacade::getAll());
    }
}
