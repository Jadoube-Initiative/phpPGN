<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn;

use pgn\Game;
use pgn\tags\Result;
use pgn\exceptions\InvalidGamePathException;

/**
 * Description of PGN
 * @todo Testes a fazer:
 * * Testes Funcionais Básicos + Caminho Básico
 * Game::__toString
 * Game::getTag
 * Game::addTag
 * Game::parse (Exceptions)
 * * Caminho Básico
 * PGN::load
 * PGN::loadFromFile
 * PGN::countGames
 * PGN::__toString
 * 
 * @todo Próximo passo: Implementar Camada de Banco de Dados
 * 
 * @author Geraldo B. Landre <geraldo.landre@gmail.com>
 */
class PGN {
    /**
     *
     * @var Game [] array of Games
     */
    private $games;
    
    /**
     * Creates a PGN object with no games
     */
    public function __construct() {
        $this->games = array ();
    }
    
    /**
     * Returns a string representation of the PGN object
     * @return string a string representation of the PGN object
     */
    public function __toString() {
        return $this->toString();
    }
    
    /**
     * Returns a string representation of the PGN object
     * @todo implement support of a properties file with the property defaultEndLine
     * @param string $endl The end-line character (default: "\n").
     * Example:
     * <pre><code>
     * <?php
     * $object = new PGN;
     * $object->toString("<br />");
     * </code></pre>
     * @return string a string representation of the PGN object
     */
    public function toString($endl = "\n") {
        if ($this->countGames() == 0) {
            return "";
        }
        
        $pgn = "";
        foreach($this->games as $game) {
            $pgn .= $game . $endl;
        }
        return $pgn;
    }
    
    /**
     * Loads games from a PGN string
     * @param string $str PGN string
     * @throws InvalidGameFormatException throws an exception if the parameter
     *         is not a string or if it doesn't have the correct fields, i.e.
     *         the move text and the seven roster tags
     */
    public function load($str) {
        $pattern = "[\s+" . Result::validPattern() . "]";
        $arr = preg_split($pattern, $str);
        
        foreach ($arr as $value) {
            $game = trim ($value);
            if(!empty($game)) {
                $game = new Game();
                $game->parse(trim($value));
                $this->games[] = $game;
            }
        }
    }
    
    /**
     * 
     * @param string $path
     * @throws InvalidGamePathException throws an exception if the file doesn't
     *          exist or if was not possible to read it
     * @throws InvalidGameFormatException throws an exception if the parameter
     *         is not a string or if it doesn't have the correct fields, i.e.
     *         the move text and the seven roster tags
     */
    public function loadFromFile($path) {
        if(!file_exists(realpath($path))) {
            throw new InvalidGamePathException('['.__CLASS__.": File [$path] doesn't exist");
        }
        
        $contents = file_get_contents($path);
        
        if($contents === FALSE) {
            throw new InvalidGamePathException('['.__CLASS__.": Couldn't read [$path]");
        }
        
        $this->load($contents);
    }

    /**
     * 
     * @return int the number of games contained in the PGN object
     */
    public function countGames() {
        return count($this->games);
    }

    /**
     * Seven Tag Roster
     * Gets the mandatory tags in a PGN game:
     * 
     * 1) Event (the name of the tournament or match event)
     * 
     * 2) Site (the location of the event)
     * 
     * 3) Date (the starting date of the game)
     * 
     * 4) Round (the playing round ordinal of the game)
     * 
     * 5) White (the player of the white pieces)
     * 
     * 6) Black (the player of the black pieces)
     * 
     * 7) Result (the result of the game)
     */
    static public function getSTR() {
        return array(
            'Event', 'Site', 'Date', 'Round', 'White', 'Black', 'Result'
        );
    }

}
