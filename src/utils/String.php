<?php

/*
 * Copyright (c) 2016 Geraldo B. Landre
 *
 * See the file LICENSE for copying permission.
 */

namespace utils;

/**
 * Description of String
 *
 * @author geraldo
 */
class String {
    // startsWith and endsWith from 
    // http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php

    /**
     * Search backwards starting from haystack length characters from the end
     * @assert("abcdef", "cd") == false
     * @assert("abcdef", "ef") == false
     * @assert("abcdef", "") == true
     * @assert("", "abcdef") == false
     * 
     * @link http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php font.
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function startsWith($haystack, $needle) {
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
    }

    /**
     * Search forward starting from end minus needle length characters
     * 
     * @assert("abcdef", "ab") == false
     * @assert("abcdef", "cd") == false
     * @assert("abcdef", "ef") == true
     * @assert("abcdef", "") == true
     * @assert("", "abcdef") == false
     * 
     * @link http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php font.
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    public static function endsWith($haystack, $needle) {
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
    }

}
