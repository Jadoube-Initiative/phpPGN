<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of UTCTime:
 * This tag is similar to the Time tag except that the time is given according to
 * the Universal Coordinated Time standard.
 * 
 * @see pgn_standard.txt
 * @author Geraldo
 */
class UTCTime extends Time {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
