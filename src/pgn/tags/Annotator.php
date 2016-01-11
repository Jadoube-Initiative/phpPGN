<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Annotator:
 * This tag uses a name or names in the format of the player name tags; this
 * identifies the annotator or annotators of the game.
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Annotator extends White {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
