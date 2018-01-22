<?php
/**
 * Created by PhpStorm.
 * User: coreywhite
 * Date: 1/22/18
 * Time: 8:23 AM
 */

namespace App\Traits;

trait PswSessions
{
    /**
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public function getUserPhpSession()
    {
        $session = session('_token');
       return $session;
    }

    /**
     * @param $anonId
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public function setAnonUserSession($anonId)
    {
        if(!session('anon_user_id')) {
            $anonId = session(['anon_user_id' => $anonId]);
            return $anonId;
        }

        return $anonId;

    }

    /**
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public function getAnonUserSession()
    {
        return session('anon_user_id');
    }

}