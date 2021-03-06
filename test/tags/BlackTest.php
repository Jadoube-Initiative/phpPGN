<?php

namespace pgn\tags;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-18 at 16:36:03.
 */
class BlackTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Black
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Black;
        echo __CLASS__ . '::' . $this->getName() . "\n";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * Generated from @assert () === "Black".
     *
     * @covers pgn\tags\Black::getName
     */
    public function testGetName() {
        $this->assertSame(
                "Black"
                , $this->object->getName()
        );
    }
    
    public function testToString() {
        $this->assertSame(
                '[Black "?"]',
                $this->object->__toString()
        );
    }
}
