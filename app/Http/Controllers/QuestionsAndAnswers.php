<?php

namespace App\Http\Controllers;

use App\Services\UserHelp\UserHelpFacade;

class QuestionsAndAnswersController extends ApiResponseController
{
    public function getQuestionsAnswersUser()
    {
        UserHelpFacade::getAll();
    }

    public function getQuestionsAnswersGuest()
    {

    }
}
