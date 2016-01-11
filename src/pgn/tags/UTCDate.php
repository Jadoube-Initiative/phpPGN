<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of UTCDate:
 * This tag is similar to the Date tag except that the date is given according to
 * the Universal Coordinated Time standard.
 * 
 * @see pgn_standard.txt
 * @author Geraldo
 */
class UTCDate extends Date {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
