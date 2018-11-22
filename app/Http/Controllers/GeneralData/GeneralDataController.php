<?php

namespace App\Http\Controllers\GeneralData;

use App\Http\Controllers\ApiResponse\ApiResponseController;
use App\Services\UserHelp\UserHelpFacade;
use App\Services\GuestHelp\GuestHelpFacade;

class GeneralDataController extends ApiResponseController
{
    public function getTerms()
    {
        return $this->success('Terms of use...');
    }

    public function getQuestionsAnswersUser()
    {
        return $this->success(UserHelpFacade::getAll());
    }

    public function getQuestionsAnswersGuest()
    {
        return $this->success(GuestHelpFacade::getAll());
    }
}
