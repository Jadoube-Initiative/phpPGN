<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\exceptions;

use Exception;

class PGNException extends Exception{
    public function __construct($message) {
        parent::__construct($message, 0, null);
    }
}
