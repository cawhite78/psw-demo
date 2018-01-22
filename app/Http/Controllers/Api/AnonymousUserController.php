<?php

namespace App\Http\Controllers\Api;

use App\Models\AnonUser;
use App\Models\AnonUserActivity;
use App\Services\User\UserActivityInterface;
use App\Services\User\UserActivityService;
use App\Traits\PswSessions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnonymousUserController extends Controller
{
    use PswSessions;

    /**
     * @var \App\Services\User\UserActivityService
     */
    protected $userActivityService;

    public function __construct(UserActivityService $userActivityService)
    {
        $this->userActivityService = $userActivityService;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param $anonId
     * @return \App\Models\AnonUserActivity|mixed
     */
    public function setUserAnonIdWithViewActivity(Request $request, $anonId)
    {
        $view = $request->input('view');
        /** @var AnonUser $anonUser */
        $anonUser = AnonUser::updateOrCreate(['id' => $anonId]);

        $anonUserActivity = $this->userActivityService->setUserViews($anonId, $view);

        return $anonUserActivity;
    }


}
