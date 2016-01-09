<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Result:
 * The Result field value is the result of the game.  It is always exactly the 
 * same as the game termination marker that concludes the associated movetext.  It 
 * is always one of four possible values: "1-0" (White wins), "0-1" (Black wins), 
 * "1/2-1/2" (drawn game), and "*" (game still in progress, game abandoned, or 
 * result otherwise unknown).  Note that the digit zero is used in both of the 
 * first two cases; not the letter "O". 
 *  
 * All possible examples: 
 *  
 * [Result "0-1"] 
 *  
 * [Result "1-0"] 
 *  
 * [Result "1/2-1/2"] 
 *  
 * [Result "*"]
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Result extends Tag {

    /**
     * @assert() === 'Result'
     * @return string Result
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }
    
    /**
     * @assert ('0-1') === true
     * @assert ('1-0') === true
     * @assert ('1/2-1/2') === true
     * @assert ('*') === true
     * @assert ('O-1') === false
     * @assert ('1-O') === false
     * @assert ('0.5-0.5') === false
     * @assert ('?') === false
     * @assert ('0-10-1') === false
     * @assert ('0-11-0') === false
     * @assert ('1-00-1') === false
     * @assert ('1-01-0') === false
     * @assert ('1/2-1/21/2-1/2') === false
     * @assert ('**') === false
     * @assert ('1/2-1/2*') === false
     * @assert ('0-1*') === false
     * @param string $data
     * @return boolean
     */
    public function validate($data) {
        return parent::validate($data) && (boolean)preg_match("/^" . self::validPattern() . "$/", $data);
    }
    
    /**
     * @assert () === '*'
     * @return string '*'
     */
    public function getDefaultValue() {
        return '*';
    }
    
    /**
     * 
     * @return string Valid Regular Expression Pattern for PGN Results
     */
    static public function validPattern() {
        return "(0-1|1-0|1\/2-1\/2|\*)";
    }
}
