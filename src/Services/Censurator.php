<?php

namespace App\Services;

class Censurator
{


    public function purify(string $message) : string
    {
        $inapropriate = ['shit','fuck', 'piss', 'bugger', 'bastard', 'wanker', 'tosser', 'bollocks'];
        return str_replace($inapropriate, '*', $message);
    }
}