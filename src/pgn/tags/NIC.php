<?php

/*
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */

namespace pgn\tags;

use utils\Parser;

/**
 * Description of NIC:
 *
 * This uses a string; this is used for an opening designation from the _New in
 * Chess_ database.
 *
 * @see pgn_standard.txt
 * @author Geraldo
 */
class NIC extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
