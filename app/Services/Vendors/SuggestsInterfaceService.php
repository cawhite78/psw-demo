<?php
/**
 * Created by PhpStorm.
 * User: coreywhite
 * Date: 1/8/18
 * Time: 11:30 PM
 */

namespace App\Services;

interface SuggestsInterfaceService
{
    /**
     * @param $query
     * @return mixed
     */
    public function querySuggests($query);

    /**
     * @param $string
     * @param array $replacementData
     * @return mixed
     */
    public function replace($string, $replacementData = []);

}