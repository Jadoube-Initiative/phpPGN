<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Site:
 * The Site tag value should include city and region names along with a 
 * standard name for the country.
 * The use of the IOC (International Olympic Committee) three letter names is 
 * suggested for those countries where such codes are available.
 * If the site of the event is unknown, a single question mark should appear 
 * as the tag value.
 * A comma may be used to separate a city from a region. No comma is needed to 
 * separate a city or region from the IOC country code.
 * A later section of this document gives a list of three letter 
 * nation codes along with a few additions for "locations" not covered 
 * by the IOC.
 * 
 * It's behavior is the same from event (validation and default value)
 * 
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Site extends Tag {
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }
}