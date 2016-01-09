<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use pgn\exceptions\InvalidDataException;
use pgn\exceptions\InvalidGameFormatException;

/**
 * Abstract class representing a Tag in a PGN game
 *
 * @author Geraldo
 */
abstract class Tag {

    /**
     * @return the name of the tag
     */
    abstract public function getName();

    protected $data;
    protected $errorMsg;

    /**
     * Returns the tag as a string. The default string patter is:
     * [TagName "content"]
     * @return string 
     */
    public function __toString() {
        return '[' . $this->getName() . ' "' . $this->get() . '"]';
    }
    
    /**
     * Sets the tag with the data if it's a valid data
     * @param string $data
     * @throws InvalidDataException throws an exception if the data is not in the correct format
     * @see Tag::validate
     */
    public function set($data) {
        if ($this->validate($data)) {
            $this->data = $data;
        } else {
            throw new InvalidDataException("[" . __CLASS__ . "]" . $this->errorMsg);
        }
    }

    /**
     * Returns the data of the tag as a string
     * @see Tag::formatted
     * @return string formatted data
     */
    public function get() {
        return $this->formatted($this->data);
    }

    /**
     * 
     * @param mixed $data
     * @return boolean returns if a data is valid
     */
    public function validate($data) {

        if ($data === \NULL) {
            return false;
        }

        if (is_array($data)) {
            return false;
        }

        if (empty($data)) {
            return false;
        }

        return true;
    }

    /**
     * Returns the default value of the Tag
     * @return string
     */
    public function getDefaultValue() {
        return '?';
    }

    /**
     * Returns its data as a formatted string
     * It's recommended to be overwritten
     * 
     * @see http://php.net/manual/pt_BR/function.strval.php
     * @return string
     */
    protected function formatted($data) {
        if (isset($data)) {
            return strval($data);
        }
        return $this->getDefaultValue();
    }

    /**
     * 
     * @param string $unparsedTag
     * @param string [] $errors array of strings
     * @return Tag The tag created
     */
    static public function parse($unparsedTag, &$errors) {

        if (!(boolean) preg_match("/^" . self::validPattern() . "$/", $unparsedTag)) {
            $errors[] = "[" . __CLASS__ . "] error trying to parse '$unparsedTag':[tag does not match with the pattern]";
            return NULL;
        }

        if (!is_array($errors)) {
            $errors = array();
        }

        $tagName = self::parseTagName($unparsedTag);
        $tagValue = self::parseTagValue($unparsedTag);
        
        return self::createTag($tagName, $tagValue);
    }

    /**
     * Parses a string in correct format of a tag 
     * and returns the value of the tag
     * @throws \pgn\exceptions\InvalidGameFormatException if tag was not on correct format
     * @assert('[TestName "Test Value"]') === "TestName"
     * @assert('[TestName "Test Value"') === "TestName"
     * @assert('asdf') throws InvalidGameFormatException
     * @param string $unparsedTag
     */
    static public function parseTagName($unparsedTag) {
        return self::parseTagAndGetMatch($unparsedTag, 1);
    }

    /**
     * Parses a string in correct format of a tag 
     * and returns the value of the tag
     * if the string is not in the correct format throws an exception
     * @throws \pgn\exceptions\InvalidGameFormatException if tag was not on correct format
     * @assert('[TestName "Test Value"]') === "Test Value"
     * @assert('[TestName "Test Value"') === "Test Value"
     * @assert('asdf') throws InvalidGameFormatException
     * @param string $unparsedTag
     */
    static public function parseTagValue($unparsedTag) {
        return self::parseTagAndGetMatch($unparsedTag, 2);
    }

    /**
     * Get the regex pattern of a valid tag string
     * @return string regex pattern of a valid tag string
     */
    static public function validPattern() {
        return "\[.*\s+\".*\"\]";
    }

    /**
     * Creates a tag, based on tags classes (@see \pgn\tags)
     * @param string $tagName the name of the tag
     * @param string $tagValue the value of the tag
     * @return \pgn\tags\Tag
     */
    static public function createTag($tagName, $tagValue) {
        try {
            $namespace = "\\pgn\\tags\\";
            $className = $namespace . $tagName;
            $tag = new $className ();
            $tag->set($tagValue);
            return $tag;
        } 
        catch(InvalidDataException $ex) {
            $errors = "[" . __CLASS__ . "] bad value [$tagValue] for tag $tagName [" . $ex->getMessage() . "]";
        } 
        catch (\Exception $ex) {
            $errors = "[" . __CLASS__ . "] urecognized Tag: $tagName [" . $ex->getMessage() . "]";
            return self::createUknownTag($tagName, $tagValue, $errors);
        }
    }

    /**
     * Creates an Uknown Tag (@see \pgn\tags\UknownTag)
     * @param string $tagName name of the tag
     * @param string $tagValue value of the tag
     * @param string $errors output parameter to store errors and warnings
     * @return \pgn\tags\UknownTag or NULL if it was not possible to create a tag
     */
    static private function createUknownTag($tagName, $tagValue, &$errors) {
        try {
            $tag = new UknownTag();
            $tag->setName($tagName);
            $tag->set($tagValue);
            return $tag;
        } catch (\Exception $ex) {
            $errors[] = "[" . __CLASS__ . "] error trying to parse '$unparsedTag' [" . $ex->getMessage() . "]";
            return NULL;
        }
    }

    /**
     * Parses a tag according to the correct format: [TagName "TagValue"]
     * and returns an array with those values. If the string is not in the
     * correct format, returns null.
     * 
     * @param string $unparsedTag string to be parsed
     * @return array array containing the matches or null if the string does not match
     */
    static private function parseTag($unparsedTag) {
        $matches = array();
        if (preg_match("/^" . self::validPattern() . "$/", $unparsedTag)) {
            $pattern = "/^\[(.*)\s+\"(.*)\"\]$/";
            preg_match($pattern, $unparsedTag, $matches);
        }
        return (count($matches == 3)) ? $matches : NULL;
    }

    /**
     * Parses a string in correct format of a tag
     * put the hole tag at index 0, the tag name at index 1 and the tag value
     * at index 2. Returns the value in the index passed
     * if the string is not in the correct format throws an exception
     * @param string $unparsedTag The tag to be parsed
     * @param int $index 0 to return the hole tag;
     *                   1 to return the tag name;
     *                   2 to return the tag value.
     * @return string the tag information located in the matches array (indexes 0, 1 or 2)
     * @throws \pgn\exceptions\InvalidGameFormatException if tag was not on correct format
     */
    static private function parseTagAndGetMatch($unparsedTag, $index) {
        $matches = self::parseTag($unparsedTag);
        if ($matches != NULL) {
            return $matches[$index];
        }
        throw new InvalidGameFormatException("[" . __CLASS__ . "]: bad tag format: " . $unparsedTag);
    }

}