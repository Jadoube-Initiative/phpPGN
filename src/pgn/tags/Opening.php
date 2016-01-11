<?php

/*
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */

namespace pgn\tags;

use utils\Parser;

/**
 * Description of Opening:
 *
 * This uses a string; this is used for the traditional opening name.  This will
 * vary by locale.
 *
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Opening extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
