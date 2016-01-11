<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of BlackNA
 * @see pgn_standard.txt
 * @author Geraldo
 */
class BlackNA extends WhiteNA {

    /**
     * @assert() === 'BlackNA'
     * @return string class name
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
