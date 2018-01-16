<?php

// truncate string at word
function truncateContent($string, $limit, $break = ".", $pad = " ...")
{

    $limit = $limit == null ? 35 : $limit;

    if (strlen($string) <= $limit) {
        return $string;
    }

    if (false !== ($max = strpos($string, $break, $limit))) {

        if ($max < strlen($string) - 1) {

            $string = substr($string, 0, $max).$pad;
        }
    }

    return $string;
}


function getBrandLogo($brand)
{
    $imageName = strtolower(str_replace(' ','-', $brand)).'.jpg';
    return '/images/brands/'.$imageName;
}