<?php
/*
 * Copyright (c) 2016 Geraldo B. Landre
 *
 * See the file LICENSE for copying permission.
 */

include_once 'phpPGN.phar';
use pgn\PGN;
use utils\String;

if($argc > 1) {
    if(String::endsWith($argv[1], "help")) {
        echo "This is a sample of usage to phpPGN.phar\n" .
             "It reads a pgn file and returns the number of games that it contains" .
             "Syntax: php " . $argv[0] . "<pgn file>";
    }
    else {
        $path = $argv[1];
        $pgn = new PGN();
        $pgn->loadFromFile($path);
        echo 'Total of ' . $pgn->countGames() . " games\n";
    }
}