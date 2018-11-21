<?

namespace App\Http\Controllers;

use App\Services\User\UserFacade;

class SessionController extends ApiResponseController
{
    public function register()
    {
        $request = request()->all();
        $validatorErrors = UserFacade::validateRegister($request);

        if ((bool) $validatorErrors) {

            return $this->error($validatorErrors);
        }

        return $this->success(UserFacade::register($request));
    }

    public function login()
    {
        $request = request(['email', 'gov_id']);
        $validatorErrors = UserFacade::validateLogin($request);

        if ((bool) $validatorErrors) {

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

        if ((bool) $validatorErrors) {

            return $this->error($validatorErrors);
        }

        $token = UserFacade::login($request);
        if ($token) {

            return $this->success($token);
        }

        return $this->error('INVALID_CREDENTIALS');

    }

    public function getTerms()
    {
        $this->success('Terms of use...');
    }
}
