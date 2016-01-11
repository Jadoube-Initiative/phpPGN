<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn;

use pgn\tags\Tag;
use pgn\exceptions\InvalidGameFormatException;

/**
 * Description of Game:
 * A PGN Game is composed by a set of tags (at least STR) and a movetext section:
 * The movetext section is composed of chess moves, move number indications, 
 * optional annotations, and a single concluding game termination marker. 
 *  
 * @todo Because illegal moves are not real chess moves, they are not permitted in PGN 
 * movetext.  They may appear in commentary, however.  One would hope that illegal 
 * moves are relatively rare in games worthy of recording.
 * 
 * Game Termination Markers:
 *  
 * Each movetext section has exactly one game termination marker; the marker 
 * always occurs as the last element in the movetext.  The game termination marker 
 * is a symbol that is one of the following four values: "1-0" (White wins), "0-1" 
 * (Black wins), "1/2-1/2" (drawn game), and "*" (game in progress, result 
 * unknown, or game abandoned).  Note that the digit zero is used in the above; 
 * not the upper case letter "O".  The game termination marker appearing in the 
 * movetext of a game must match the value of the game's Result tag pair.  (While 
 * the marker appears as a string in the Result tag, it appears as a symbol 
 * without quotes in the movetext.)
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Game {

    /**
     *
     * @var Tag [] array of tags
     */
    private $tags;

    /**
     *
     * @var string 
     */
    private $moveText;

    /**
     *
     * @var string [] array
     */
    private $parseErrors;

    /**
     * Creates an empty Game
     */
    public function __construct() {
        $this->moveText = "";
        $this->tags = array();
        $this->parseErrors = array();
    }

    /**
     * Returns a string representation of the Game object
     * @return string a string representation of the PGN object
     */
    public function __toString() {
        return $this->toString();
    }
    
    /**
     * Returns a string representation of the Game object
     * @todo implement support of a properties file with the property defaultEndLine
     * @param string $endl The end-line character (default: "\n").
     * Example:
     * <pre><code>
     * <?php
     * $object = new Game;
     * $object->toString("<br />");
     * </code></pre>
     * @return string a string representation of the PGN object
     */
    public function toString($endLine = "\n") {
        
        if (empty($this->moveText) && count($this->tags) == 0) {
            return "";
        }
        
        $strTags = "";
        foreach($this->tags as $tag) {
            $strTags .= $tag . $endLine;
        }
        
        return $strTags . $endLine . $endLine . $this->moveText;
    }
    
    /**
     * Parses a string containing a game and fills movetext and tags attributes.
     * The tag attribute is filled as an associative array (TagName => TagObject)
     * 
     * @assert(NULL) throws pgn\exceptions\InvalidGameFormatException
     * @assert(123) throws pgn\exceptions\InvalidGameFormatException
     * 
     * @param string $unparsedGame string containing one PGN Game
     * @throws InvalidGameFormatException throws an exception if the parameter
     *         is not a string or if it doesn't have the correct fields, i.e.
     *         the move text and the seven roster tags
     */
    public function parse($unparsedGame) {
        if (!is_string($unparsedGame)) {
            throw new InvalidGameFormatException("[" . __CLASS__ . "] invalid game format (it's not a valid string): " . $unparsedGame);
        }
        
        $parsing = explode("]", $unparsedGame);
        
        if(count($parsing) < 8) {
            throw new InvalidGameFormatException("[" . __CLASS__ . "] invalid game format (it doesn't have correct fields): " . $unparsedGame);
        }
        
        $uncheckedMoveText = array_pop($parsing);

        foreach ($parsing as $unparsedTag) {
            $tag = Tag::parse($unparsedTag . "]", $this->parseErrors);
            $this->addTag($tag);
        }
        
        if (!$this->checkSetUpAndFEN()) {
            throw new InvalidGameFormatException("[" . __CLASS__ . "] invalid game format (SetUp=1 without FEN): " . $unparsedGame);
        }
        
        if ($this->checkMoveText($uncheckedMoveText)) {
            $this->moveText = $uncheckedMoveText;
        } else {
            $this->parseErrors[] = "[" . __CLASS__ . "] MoveText: " . $uncheckedMoveText;
        }
    }
    
    /**
     * 
     * @param string $tagName
     * @return Tag
     */
    public function getTag($tagName) {
        if(array_key_exists($tagName, $this->tags)) {
            return $this->tags[$tagName];
        }
        return NULL;
    }
    
    /**
     * 
     * @param Tag $tag
     */
    public function addTag($tag) {
        if ($tag instanceof Tag) {
            $this->tags[$tag->getName()] = $tag;
        }
    }
    
    /**
     * @todo implement this method
     * @param string $uncheckedMoveText
     * @return boolean
     */
    protected function checkMoveText($uncheckedMoveText) {
        return true;
    }

    protected function checkSetUpAndFEN() {
        $setUp = $this->getTag("SetUp");
        $fen = $this->getTag("FEN");
        
        // the pair SetUp and FEN must exists together
        if($setUp === NULL) {
            return $fen === NULL;
        }
        else {
            return $fen !== NULL;
        }
    }

}
