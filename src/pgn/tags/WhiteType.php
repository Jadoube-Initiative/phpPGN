<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of WhiteType:
 * These tags use string values; these describe the player types.  The value
 * "human" should be used for a person while the value "program" should be used
 * for algorithmic (computer) players.
 *
 * @see pgn_standard.txt
 * @author Geraldo
 */
class WhiteType extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

    /**
     * @assert("human") === true
     * @assert("program") === true
     * @assert("person") === false
     * @assert("software") === false
     * @assert(3.1) === false
     * @assert("4.1.2") === false
     * @assert("-") === false
     * @assert(NULL) === false
     * @assert("A") === false
     * @assert("asdf") === false
     * @assert("*") === false
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
        return "human|program";
    }

}
