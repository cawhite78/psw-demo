<?php
/**
 * Created by PhpStorm.
 * User: coreywhite
 * Date: 1/8/18
 * Time: 10:51 PM
 */

namespace App\Services;

interface SearchInterfaceService
{
    /**
     * @param $query
     * @return mixed
     */
    public function querySearch($query);
}