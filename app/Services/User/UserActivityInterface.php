<?php
/**
 * Created by PhpStorm.
 * User: coreywhite
 * Date: 1/22/18
 * Time: 9:12 AM
 */

namespace App\Services\User;

interface UserActivityInterface
{
    /**
     * @param $anonId
     * @param $userSession
     * @return mixed
     */
    public function getUserSearch($anonId, $userSession);

    /**
     * @param $anonId
     * @param $userSession
     * @param $activity
     * @return mixed
     */
    public function setUserSearch($anonId, $activity);

    /**
     * @param $anonId
     * @param $userSession
     * @param $view
     * @return mixed
     */
    public function getUserViews($anonId, $userSession, $view);

    /**
     * @param $anonId
     * @param $userSession
     * @param $view
     * @return mixed
     */
    public function setUserViews($anonId, $view);

}