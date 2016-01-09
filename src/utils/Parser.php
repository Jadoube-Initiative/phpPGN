<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace utils;

/**
 * Designed to be a general purpose parser
 * 
 * @author Geraldo
 */
class Parser {

    /**
     * 
     * @param string $name name of the class, returned by get_class() function
     * @return array with to positions: className and namespace
     * @throws ParserException
     */
    static function parseClassName($name) {
        if (!is_array($name) && !empty($name)) {
            $sliceExploded = explode('\\', $name);
            
            $len = count($sliceExploded);
            $last = $len - 1;
            
            $array = array('className' => $sliceExploded[$last], 'namespace' => null);
            
            if($len > 1) {
                $array['namespace'] = array_slice($sliceExploded, 0, -1);
            }
            
            return $array; 
        } else {
            throw new ParserException("Bad class name: [$name]");
        }
    }
}
