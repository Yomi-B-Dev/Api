<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomResponse;

class GeneralDataController extends Controller
{
    public function getTerms()
    {
        return CustomResponse::response(['some terms of use'], 'data');
    }

    public function getQuestionAnswersLogin()
    {
        
    }

    public function getQuestionAnswersHelp()
    {
        
    }
}
