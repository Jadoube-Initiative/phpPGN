<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of BlackElo:
 * 9.1.2: Tags: WhiteElo, BlackElo
 * These tags use integer values; these are used for FIDE Elo ratings.  A value of
 * "-" is used for an unrated player.
 * @see pgn_standard.txt
 * @author Geraldo
 */
class BlackElo extends WhiteElo {

    /**
     * @assert () == "BlackElo"
     * @return string
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }
}
