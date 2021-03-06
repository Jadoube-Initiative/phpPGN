<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of WhiteElo:
 * 9.1.2: Tags: WhiteElo, BlackElo
 * These tags use integer values; these are used for FIDE Elo ratings.  A value of
 * "-" is used for an unrated player.
 * @see pgn_standard.txt
 * @author Geraldo
 */
class WhiteElo extends Tag {

    /**
     * @assert() === "WhiteElo"
     * @return string
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }
    /**
     * @assert () === "-"
     * @return string
     */
    public function getDefaultValue() {
        return "-";
    }

    /**
     * @assert("1900") === true
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
