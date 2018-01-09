<?php

namespace App\Traits;

trait SuggestsStringReplacement
{

    public function replaceString($string, $replacements = [])
    {

        $miss = [];
        $suggest = [];
        $replacements = $replacements['flaggedTokens'];
        foreach($replacements as $item) {
            $miss[] = $item['token'];
            $suggest[] = $item['suggestions'][0]['suggestion'];
        }

        $newString = str_replace($miss, $suggest, $string);
        return $newString;

    }

}