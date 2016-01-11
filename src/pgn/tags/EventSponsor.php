<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of EventSponsor:
 * This uses a string value giving the name of the sponsor of the event.
 * 
 * @see pgn_standard.txt
 * @author Geraldo
 */
class EventSponsor extends White {

    /**
     * 
     * @assert () === "EventSponsor"
     * @return string EventSponsor
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

}
