#!/usr/bin/env php
<?php
/*
 * Copyright (c) 2016 Geraldo B. Landre
 *
 * See the file LICENSE for copying permission.
 */

error_reporting(0);

include_once 'phpPGN.phar';

use pgn\PGN;

$help = "This is a sample of usage to phpPGN.phar\n"
        . "It allows the manipulation of a PGN object by calling its methods and passing parameters"
        . "Example: \n"
        . "> loadFromFile 3-games-sample.pgn\n"
        . "OK!\n"
        . "> countGames\n"
        . "3\n"
        . "type 'exit' to exit or 'help' to print this message\n";
echo "Type a PGN method (you can start witn help)\n";

$pgn = new PGN;

echo '> ';
$line = trim(fgets(STDIN));
list($method, $param1, $param2) = explode(' ', $line);

while ($method != 'exit') {
    if ($method == 'help') {
        echo $help;
    } else {
        try {
            if (!empty($param1)) {
                if (!empty($param2)) {
                    echo '$pgn->' . "$method($param1, $param2): ";
                    $result = $pgn->$method($param1, $param2);
                    if (empty($result)) {
                        echo "OK!\n";
                    } else {
                        echo "$result\n";
                    }
                } else {
                    echo '$pgn->' . "$method($param1): ";
                    $result = $pgn->$method($param1);
                    if (empty($result)) {
                        echo "OK!\n";
                    } else {
                        echo "$result\n";
                    }
                }
            } else {
                echo '$pgn->' . "$method(): ";
                $result = $pgn->$method();
                if (empty($result)) {
                    echo "OK!\n";
                } else {
                    echo "$result\n";
                }
            }
        } catch (Exception $ex) {
            echo "Exception thrown... Message: {$ex->getMessage()}\n"
            . "Trace: {$ex->getTraceAsString()}\n";
        }
    }

    echo '> ';
    $line = trim(fgets(STDIN));
    list($method, $param1, $param2) = explode(' ', $line);
} while ($method != 'exit');

echo "Good Bye!\n";
exit(0);
