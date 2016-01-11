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
class Termination extends Tag {

    /**
     * @assert() === 'Termination'
     * @return string
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

    /**
     * @assert("abandoned") === true
     * @assert("adjudication") === true
     * @assert("death") === true
     * @assert("emergency") === true
     * @assert("normal") === true
     * @assert("rules infraction") === true
     * @assert("time forfeit") === true
     * @assert("unterminated") === true
     * @assert("human") === false
     * @assert("program") === false
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

        if (!parent::validate($data)) {
            return false;
        }

        return preg_match_all("/^" . self::validPattern() . "$/", $data) === 1;
    }

    /**
     * 
     * @return string Valid Regular Expression 
     */
    static public function validPattern() {
        return "abandoned|adjudication|death|emergency|normal|rules\sinfraction|time\sforfeit|unterminated";
    }

}
