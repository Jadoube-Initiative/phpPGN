<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * @see pgn_standard.txt
 * @author Geraldo
 */
class WhiteTitle extends Tag {

    /**
     * @assert() === 'WhiteTitle'
     * @return string
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }
    
    /**
     * @param string $data
     * @return boolean
     */
    public function validate($data) {
        
        if(!parent::validate($data)) {
            return false;
        }
        
        if($data === '-') {
            return true;
        }
        
        return preg_match_all("/^" . self::validPattern() . "$/", $data) === 1;
    }
    
    /**
     * 
     * @return string Valid Regular Expression 
     */
    static public function validPattern() {
        return "GM|IM|FM";
    }

}
