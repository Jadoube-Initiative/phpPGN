<?php

namespace pgn\tags;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-01-11 at 10:12:02.
 */
class TimeControlTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var TimeControl
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new TimeControl;
        echo __CLASS__ . '::' . $this->getName() . "\n";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * Generated from @assert ("?") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate() {
        $this->assertSame(
                true
                , $this->object->validate("?")
        );
    }

    /**
     * Generated from @assert ("-") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate2() {
        $this->assertSame(
                true
                , $this->object->validate("-")
        );
    }

    /**
     * Generated from @assert ("32/45") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate3() {
        $this->assertSame(
                true
                , $this->object->validate("32/45")
        );
    }

    /**
     * Generated from @assert ("40/9000") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate4() {
        $this->assertSame(
                true
                , $this->object->validate("40/9000")
        );
    }

    /**
     * Generated from @assert ("300") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate5() {
        $this->assertSame(
                true
                , $this->object->validate("300")
        );
    }

    /**
     * Generated from @assert ("35+5") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate6() {
        $this->assertSame(
                true
                , $this->object->validate("35+5")
        );
    }

    /**
     * Generated from @assert ("*35") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate7() {
        $this->assertSame(
                true
                , $this->object->validate("*35")
        );
    }

    /**
     * Generated from @assert ("-:40/9000:30/3000:15/30000:300") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate8() {
        $this->assertSame(
                true
                , $this->object->validate("-:40/9000:30/3000:15/30000:300")
        );
    }

    /**
     * Generated from @assert ("-:40/9000:30/3000:15/30000:*35") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate9() {
        $this->assertSame(
                true
                , $this->object->validate("-:40/9000:30/3000:15/30000:*35")
        );
    }

    /**
     * Generated from @assert ("-:40/9000:*35:40/9000:300") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate10() {
        $this->assertSame(
                true
                , $this->object->validate("-:40/9000:*35:40/9000:300")
        );
    }

    /**
     * Generated from @assert ("32/45:300") === true.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate11() {
        $this->assertSame(
                true
                , $this->object->validate("32/45:300")
        );
    }

    /**
     * Generated from @assert ("?:-:40/9000:300:300:*35") === false.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate12() {
        $this->assertSame(
                false
                , $this->object->validate("?:-:40/9000:300:300:*35")
        );
    }

    /**
     * Generated from @assert ("123,45") === false.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate13() {
        $this->assertSame(
                false
                , $this->object->validate("123,45")
        );
    }

    /**
     * Generated from @assert ("22/35.-") === false.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate14() {
        $this->assertSame(
                false
                , $this->object->validate("22/35.-")
        );
    }

    /**
     * Generated from @assert ("??.??") === false.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate15() {
        $this->assertSame(
                false
                , $this->object->validate("??.??")
        );
    }

    /**
     * Generated from @assert ("?.-") === false.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate16() {
        $this->assertSame(
                false
                , $this->object->validate("?.-")
        );
    }

    /**
     * Generated from @assert ("asdf") === false.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate17() {
        $this->assertSame(
                false
                , $this->object->validate("asdf")
        );
    }

    /**
     * Generated from @assert (2) === false.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate18() {
        $this->assertSame(
                true
                , $this->object->validate(2)
        );
    }

    /**
     * Generated from @assert ("a") === false.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate19() {
        $this->assertSame(
                false
                , $this->object->validate("a")
        );
    }

    /**
     * Generated from @assert (NULL) === false.
     *
     * @covers pgn\tags\TimeControl::validate
     */
    public function testValidate20() {
        $this->assertSame(
                false
                , $this->object->validate(NULL)
        );
    }

    /**
     * @covers pgn\tags\TimeControl::getName
     * @todo   Implement testGetName().
     */
    public function testGetName() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers pgn\tags\TimeControl::validPattern
     * @todo   Implement testValidPattern().
     */
    public function testValidPattern() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
