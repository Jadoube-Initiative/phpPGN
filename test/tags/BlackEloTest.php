<?php

namespace pgn\tags;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-18 at 20:17:45.
 */
class BlackEloTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var BlackElo
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new BlackElo;
        echo __CLASS__ . '::' . $this->getName() . "\n";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * Generated from @assert () == "BlackElo".
     *
     * @covers pgn\tags\BlackElo::getName
     */
    public function testGetName() {
        $this->assertEquals(
                "BlackElo"
                , $this->object->getName()
        );
    }

}
