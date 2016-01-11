<?php

/*
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */

namespace pgn\tags;

use utils\Parser;

/**
 * Description of SubVariation:
 *
 * This uses a string; this is used to further refine the Variation tag.  This
 * will vary by locale.
 *
 * @see pgn_standard.txt
 * @author Geraldo
 */
class SubVariation extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
