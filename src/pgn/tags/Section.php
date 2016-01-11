<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Section:
 * This uses a string; this is used for the playing section of a tournament (e.g.,
 * "Open" or "Reserve").
 *
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Section extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
