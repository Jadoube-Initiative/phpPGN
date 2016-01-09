<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Event:
 * The Event tag value should be reasonably descriptive.
 * Abbreviations are to be avoided unless absolutely necessary.
 * A consistent event naming should be used to help facilitate database scanning.  
 * If the name of the event is unknown, a single question mark should appear as the tag value.
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Event extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
