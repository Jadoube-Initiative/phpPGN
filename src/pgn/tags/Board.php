<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Board:
 * This uses an integer; this identifies the board number in a team event and also
 * in a simultaneous exhibition.
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Board extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

    /**
     * @assert("1") === true
     * @assert("19") === true
     * @assert(1) === true
     * @assert("3.1") === false
     * @assert(3.1) === false
     * @assert("4.1.2") === false
     * @assert("-") === false
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
        
        return preg_match_all("/^" . self::validPattern() . "$/", $data) === 1;
    }
    
    /**
     * 
     * @return string Valid Regular Expression Pattern for PGN Rounds
     */
    static public function validPattern() {
        return "\d+";
    }

}
