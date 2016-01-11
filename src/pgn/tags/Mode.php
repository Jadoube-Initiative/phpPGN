<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Mode:
 * This uses a string that gives the playing mode of the game.  Examples: "OTB"
 * (over the board), "PM" (paper mail), "EM" (electronic mail), "ICS" (Internet
 * Chess Server), and "TC" (general telecommunication).
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Mode extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
