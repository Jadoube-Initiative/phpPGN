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
class TimeControl extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

    /**
     * 
     * @assert("?") === true
     * @assert("-") === true
     * @assert("32/45") === true
     * @assert("40/9000") === true
     * @assert("300") === true
     * @assert("35+5") === true
     * @assert("*35") === true
     * @assert("-:40/9000:30/3000:15/30000:300") === true
     * @assert("-:40/9000:30/3000:15/30000:*35") === true
     * @assert("-:40/9000:*35:40/9000:300") === true
     * @assert("32/45:300") === true
     * @assert("?:-:40/9000:300:300:*35") === false
     * @assert("123,45") === false
     * @assert("22/35.-") === false
     * @assert("??.??") === false
     * @assert("?.-") === false
     * @assert("asdf") === false
     * @assert(2) === true
     * @assert("a") === false
     * @assert(NULL) === false
     * 
     * @todo("300:300:*35:40/9000:-") === false
     * @todo("00/300:?") === false
     * @todo("00/300:-") === false
     * @todo("-:40/9000:*35:40/9000:300") === false
     * @todo("300:300:*35") === false
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
        return "(\?|-|\d+\/\d+|\*\d+|\d+\+\d+|\d+)(:(\?|-|\d+\/\d+|\d+\+\d+|\d+|\*\d+)){0,4}";
    }

}
