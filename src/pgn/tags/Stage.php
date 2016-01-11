<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Stage:
 * This uses a string; this is used for the stage of a multistage event (e.g.,
 * "Preliminary" or "Semifinal").
 *
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Stage extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
