<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace utils;

/**
 *
 * @author Geraldo B. Landre <geraldo at facom.ufms.br>
 */
class ParserException extends \Exception {
    public function __construct($message) {
        parent::__construct($message, 0, NULL);
    }
}
