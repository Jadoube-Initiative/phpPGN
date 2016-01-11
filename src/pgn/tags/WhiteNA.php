<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of White:
 * The White tag value is the name of the player or players of the white pieces.
 * The names are given as they would appear in a telephone directory.  The family
 * or last name appears first.  If a first name or first initial is available, it
 * is separated from the family name by a comma and a space.  Finally, one or more
 * middle initials may appear.  (Wherever a comma appears, the very next character
 * should be a space.  Wherever an initial appears, the very next character should
 * be a period.)  If the name is unknown, a single question mark should appear as
 * the tag value.
 *
 * The intent is to allow meaningful ASCII sorting of the tag value that is
 * independent of regional name formation customs.  If more than one person is
 * playing the white pieces, the names are listed in alphabetical order and are
 * separated by the colon character between adjacent entries.  A player who is
 * also a computer program should have appropriate version information listed
 * after the name of the program.
 *
 * The format used in the FIDE Rating Lists is appropriate for use for player name
 * tags.
 *
 * Examples:
 *
 * [White "Tal, Mikhail N."]
 *
 * [White "van der Wiel, Johan"]
 *
 * [White "Acme Pawngrabber v.3.2"]
 *
 * @see pgn_standard.txt
 * @author Geraldo
 */
class WhiteNA extends Tag {

    /**
     * @assert () === 'WhiteNA'
     * @return string WhiteNA
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

    /**
     * @assert("-") === true
     * @assert("email@domain.com") === true
     * @assert("http://www.meusite.com") === true
     * @assert("http://www.meusite.com/diretorio") === true
     * @assert("http://www.meusite.com/diretorio/pagina.html") === true
     * @assert("https://meusite.com/diretorio/pagina.html") === true
     * Tests based on description:
     * @assert("Tal, Mikhail N.") === false
     * @assert("van der Wiel, Johan") === false
     * @assert("Acme Pawngrabber v.3.2") === false
     * @assert("?") === false
     * Basic path tests:
     * @assert (NULL) === false
     * @assert ("ab") === false
     * @assert (", ") === false
     * @assert (",a") === false
     * @assert ("a") === false
     * @param string $data
     * @return bool true if data is valid and false if not.
     */
    public function validate($data) {
        if (!parent::validate($data)) {
            return false;
        }
        
        return preg_match_all("/^" . self::validPattern() . "$/", $data) === 1;
    }
    
    /**
     * 
     * @return string Valid Regular Expression Pattern for Network Address
     */
    static public function validPattern() {
        return "-|\w+@\w+\.\w+|http(s)?\:\/\/.+";
    }

}
