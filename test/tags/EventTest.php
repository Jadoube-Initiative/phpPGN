<?php

namespace pgn\tags;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-07 at 17:50:42.
 */
class EventTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Event
     */
    protected $object;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Event;
        $this->data = "a value to set";
        echo __CLASS__ . '::' . $this->getName() . "\n";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers pgn\tags\Event::getName
     */
    public function testGetName() {
        $expected = 'Event';
        $result = $this->object->getName();
        
        $this->assertEquals($expected, $result);
    }

}
