<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Round:
 * The Round tag value gives the playing round for the game.  In a match
 * competition, this value is the number of the game played.  If the use of a
 * round number is inappropriate, then the field should be a single hyphen
 * character.  If the round is unknown, a single question mark should appear as
 * the tag value.
 *
 * Some organizers employ unusual round designations and have multipart playing
 * rounds and sometimes even have conditional rounds.  In these cases, a multipart
 * round identifier can be made from a sequence of integer round numbers separated
 * by periods.  The leftmost integer represents the most significant round and
 * succeeding integers represent round numbers in descending hierarchical order.
 *
 * Examples:
 *
 * [Round "1"]
 *
 * [Round "3.1"]
 *
 * [Round "4.1.2"]
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Round extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

    /**
     * @assert("1") === true
     * @assert(1) === true
     * @assert("3.1") === true
     * @assert(3.1) === true
     * @assert("4.1.2") === true
     * @assert("-") === true
     * @assert("?") === true
     * @assert(NULL) === false
     * @assert("A") === false
     * @assert("asdf") === false
     * @assert("*") === false
     * @assert("????.??.??") === false
     * @param string $data
     * @return boolean
     */
    public function validate($data) {
        
        if(!parent::validate($data)) {
            return false;
        }
        
        if($data === '?') {
            return true;
        }
        
        return preg_match_all(self::validPattern(), $data) === 1;
    }
    
    /**
     * 
     * @return string Valid Regular Expression Pattern for PGN Rounds
     */
    static public function validPattern() {
        return "/^[\-]{1}|\d(\.\d)*$/";
    }
}
