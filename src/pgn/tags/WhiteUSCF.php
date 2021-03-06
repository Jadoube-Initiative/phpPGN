<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * 
 * @see pgn_standard.txt
 * @author Geraldo
 */
class WhiteUSCF extends WhiteElo {

    /**
     * @assert() === "WhiteUSCF"
     * @return string
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }
}
