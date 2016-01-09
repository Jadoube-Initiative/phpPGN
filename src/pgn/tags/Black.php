<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Black:
 * The Black tag value is the name of the player or players of the black pieces.
 * The names are given here as they are for the White tag value.
 * 
 * Examples:
 * 
 * [Black "Lasker, Emmanuel"]
 * 
 * [Black "Smyslov, Vasily V."]
 * 
 * [Black "Smith, John Q.:Woodpusher 2000"]
 * 
 * [Black "Morphy"]
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Black extends White {

    /**
     * Returns the name of the class, i.e., Black as a string
     * @assert () === "Black"
     * @return string Black
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
