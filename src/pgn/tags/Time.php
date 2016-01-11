<?php

/*
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */

namespace pgn\tags;

use utils\Parser;

/**
 * Description of Time:
 *
 * This uses a time-of-day value in the form "HH:MM:SS"; similar to the Date tag
 * except that it denotes the local clock time (hours, minutes, and seconds) of
 * the start of the game.  Note that colons, not periods, are used for field
 * separators for the Time tag value.  The value is taken from the local time
 * corresponding to the location given in the Site tag pair.
 *
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Time extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

    /**
     * 
     * @assert("00:00:00") === true
     * @assert("00.00.00") === false
     * @assert("19:33:15") === true
     * @assert("20:50:09") === true
     * @assert("23:59:59") === true
     * @assert("-1:33:15") === false
     * @assert("00:-1:15") === false
     * @assert("00:00:-1") === false
     * @assert("24:00:00") === false
     * @assert("19:60:00") === false
     * @assert("19:59:60") === false
     * @assert(2) === false
     * @assert("a") === false
     * @assert(NULL) === false
     * 
     * @param mixed $data
     * @return boolean returns if a data is valid
     */
    public function validate($data) {
        if (!parent::validate($data)) {
            return false;
        }

        return preg_match_all("/^" . self::validPattern() . "$/", $data) === 1;
    }

    /**
     * Get the regex pattern of a valid FEN tag string
     * @return string regex pattern of a valid SetUp tag string
     */
    static public function validPattern() {
        return "([0-1][0-9]|2[0-3])(:[0-5][0-9]){2}";
    }

}
