<?php

/*
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */

namespace pgn\tags;

use utils\Parser;

/**
 * Description of FEN:
 * This tag uses a string that gives the Forsyth-Edwards Notation for the starting
 * position used in the game.  FEN is described in a later section of this
 * document.  If a SetUp tag appears with a tag value of "1", the FEN tag pair is
 * also required.
 * 
 * Data fields (6): Piece placement data, Active color, Castling availability,
 * 	En passant target square, Halfmove clock, Fullmove number
 * 
 * Examples:
 * 	rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1
 * 	rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1
 * 	rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2
 * 	rnbqkbnr/pp1ppppp/8/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2
 * 	4k3/8/8/8/8/8/4P3/4K3 w - - 5 39
 * 
 * @see pgn_standard.txt
 * @author Geraldo
 */
class FEN extends Tag {

    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

    /**
     * 
     * @assert("rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1") === true
     * @assert("rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1") === true
     * @assert("rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2") === true
     * @assert("rnbqkbnr/pp1ppppp/8/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2") === true
     * @assert("4k3/8/8/8/8/8/4P3/4K3 w - - 5 39") === true
     * @assert("Prq1823Br b kqKQ 1 1 1") === false
     * @assert(2) === false
     * @assert("a") === false
     * @assert(NULL) === false
     * 
     * @param mixed $data
     * @return boolean returns if a data is valid
     */
    public function validate($data) {
        if (!parent::validate($data)) {
            return false;
        }

        return preg_match_all("/^" . self::validPattern() . "$/", $data) === 1;
    }

    /**
     * Get the regex pattern of a valid FEN tag string
     * @return string regex pattern of a valid SetUp tag string
     */
    static public function validPattern() {
        return "[PNBRQKpnbrqk1-8\/]+\s[wb]\s(-|K?Q?k?q?)\s(-|[abcdefgh][36])\s\d+\s\d+";
    }

}
