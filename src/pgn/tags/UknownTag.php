<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use pgn\exceptions\InvalidClassNameException;

/**
 * Represents an unrecognized tag
 *
 * @author Geraldo
 */
class UknownTag extends Tag {
    /**
     *
     * @var string 
     */
    private $className;
    
    /**
     * 
     * @param string $name
     * @throws InvalidClassNameException
     */
    public function setName($name) {
        if(is_string($name)) {
            $this->className = $name;
        }
        else {
            throw new InvalidClassNameException("[" . __CLASS__ . "] bad name: " . $name);
        }
    }
    
    /**
     * 
     * @return string name of the class
     * @throws InvalidClassNameException if className was not set
     */
    public function getName() {
        if(!empty($this->className)) {
            return $this->className;
        }
        throw new InvalidClassNameException("[" . __CLASS__ . "] name was not set for an uknown tag");
    }
}
