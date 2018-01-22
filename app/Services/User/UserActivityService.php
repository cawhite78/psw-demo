<?php
/**
 * Created by PhpStorm.
 * User: coreywhite
 * Date: 1/22/18
 * Time: 9:11 AM
 */

namespace App\Services\User;

use App\Models\AnonUserActivity;
use App\Traits\PswSessions;

class UserActivityService
{
    use PswSessions;
    /**
     * @param $anonId
     * @param $userSession
     * @return mixed
     * @internal param $anonUser
     */
    public function getUserSearch($anonId, $userSession)
    {
        // TODO: Implement getUserSearch() method.
    }

    /**
     * @param $query
     * @param $brand
     * @return \App\Models\AnonUserActivity
     */
    public function setUserSearch($query)
    {
        /** @var AnonUserActivity $anonIdActivity */
        $anonIdActivity = AnonUserActivity::where(['anon_user' => $this->getAnonUserSession(), 'anon_session' => $this->getUserPhpSession()])->first();

        if($anonIdActivity == null) {
            $anonIdActivity = new AnonUserActivity;
            $anonIdActivity->anon_user = $this->getAnonUserSession();
            $anonIdActivity->anon_session = $this->getUserPhpSession();
            $anonIdActivity->search = json_encode([$query]);
            $anonIdActivity->save();
        } else {
            if($query !== null) {
                $searchData = collect(json_decode($anonIdActivity->search, 1))->push($query);
                $anonIdActivity->search = json_encode($searchData);
                $anonIdActivity->save();
            }
        }

        return $anonIdActivity;

    }

    /**
     * @param $anonId
     * @param $userSession
     * @param $view
     * @return mixed
     */
    public function getUserViews($anonId, $userSession, $view)
    {
        // TODO: Implement getUserViews() method.
    }

    /**
     * @param $anonId
     * @param $view
     */
    public function setUserViews($anonId, $view)
    {
        /** @var AnonUserActivity $anonIdActivity */
        $anonIdActivity = AnonUserActivity::where(['anon_user' => $anonId, 'anon_session' => $this->getUserPhpSession()])->first();

        if($anonIdActivity == null) {
            $anonIdActivity = new AnonUserActivity;
            $anonIdActivity->anon_user = $anonId;
            $anonIdActivity->anon_session = $this->getUserPhpSession();
            $anonIdActivity->views = json_encode([$view]);
            $anonIdActivity->save();
        } else {
            if($view !== null) {
                $viewsData = collect(json_decode($anonIdActivity->views, 1))->push($view);
                $anonIdActivity->views = json_encode($viewsData);
                $anonIdActivity->save();
            }
        }

        return $anonIdActivity;
    }
}