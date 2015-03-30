<?php

Translate::lookup();

class Translate
{
    const ENGLISH = 0;
    const FRENCH = 1;
    const SPANISH = 2;
    const GERMAN = 3;


    static function lookup()
    {
        echo self::SPANISH;
    }

}

