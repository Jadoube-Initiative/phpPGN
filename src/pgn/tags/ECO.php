<?php

/*
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */

namespace pgn\tags;

use utils\Parser;

/**
 * Description of ECO:
 * 9.4.1: Tag: ECO
 *
 * This uses a string of either the form "XDD" or the form "XDD/DD" where the "X"
 * is a letter from "A" to "E" and the "D" positions are digits; this is used for
 * an opening designation from the five volume _Encyclopedia of Chess Openings_.
 * This tag pair is associated with the use of the EPD opcode "eco" described in a
 * later section of this document.
 *
 * @see pgn_standard.txt
 * @author Geraldo
 */
class ECO extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }
    
    /**
     * 
     * @assert("A00") === true
     * @assert("A00/00") === true
     * @assert("E99") === true
     * @assert("E99/99") === true
     * @assert("C12/34") === true
     * @assert("C21") === true
     * @assert(NULL) === false
     * @assert("A") === false
     * @assert("A0") === false
     * @assert("A00/0") === false
     * @assert("asdf") === false
     * @assert(123) === false
     * @assert("*") === false
     * @assert("????.??.??") === false
     * 
     * @param mixed $data
     * @return boolean returns if a data is valid
     */
    public function validate($data) {
        if(!parent::validate($data)) {
            return false;
        }
        
        return preg_match_all("/^" . self::validPattern() . "$/", $data) === 1;
    }
    
    /**
     * Get the regex pattern of a valid ECO tag string
     * @return string regex pattern of a valid ECO tag string
     */
    static public function validPattern() {
        return "[A-E]\d\d(\/\d\d)?";
    }

}
