<?php

/*
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */

namespace pgn\tags;

use utils\Parser;

/**
 * Description of SetUp:
 * This tag takes an integer that denotes the "set-up" status of the game.  A
 * value of "0" indicates that the game has started from the usual initial array.
 * A value of "1" indicates that the game started from a set-up position; this
 * position is given in the "FEN" tag pair.  This tag must appear for a game
 * starting with a set-up position.  If it appears with a tag value of "1", a FEN
 * tag pair must also appear.
 * @see pgn_standard.txt
 * @author Geraldo
 */
class SetUp extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

    /**
     * 
     * @assert("") === true
     * @assert("0") === true
     * @assert("1") === true
     * @assert("-1") === false
     * @assert("2") === false
     * @assert("a") === false
     * @assert(NULL) === false
     * @assert("A") === false
     * @assert("*") === false
     * @assert("2.1") === false
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
     * Get the regex pattern of a valid SetUp tag string
     * @return string regex pattern of a valid SetUp tag string
     */
    static public function validPattern() {
        return "[0|1]";
    }

}
