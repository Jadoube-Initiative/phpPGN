<?php

namespace pgn\tags;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-01-11 at 10:48:51.
 */
class WhiteTypeTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var WhiteType
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new WhiteType;
        echo __CLASS__ . '::' . $this->getName() . "\n";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * Generated from @assert ("human") === true.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate() {
        $this->assertSame(
                true
                , $this->object->validate("human")
        );
    }

    /**
     * Generated from @assert ("program") === true.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate2() {
        $this->assertSame(
                true
                , $this->object->validate("program")
        );
    }

    /**
     * Generated from @assert ("person") === false.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate3() {
        $this->assertSame(
                false
                , $this->object->validate("person")
        );
    }

    /**
     * Generated from @assert ("software") === false.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate4() {
        $this->assertSame(
                false
                , $this->object->validate("software")
        );
    }

    /**
     * Generated from @assert (3.1) === false.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate5() {
        $this->assertSame(
                false
                , $this->object->validate(3.1)
        );
    }

    /**
     * Generated from @assert ("4.1.2") === false.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate6() {
        $this->assertSame(
                false
                , $this->object->validate("4.1.2")
        );
    }

    /**
     * Generated from @assert ("-") === false.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate7() {
        $this->assertSame(
                false
                , $this->object->validate("-")
        );
    }

    /**
     * Generated from @assert (NULL) === false.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate8() {
        $this->assertSame(
                false
                , $this->object->validate(NULL)
        );
    }

    /**
     * Generated from @assert ("A") === false.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate9() {
        $this->assertSame(
                false
                , $this->object->validate("A")
        );
    }

    /**
     * Generated from @assert ("asdf") === false.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate10() {
        $this->assertSame(
                false
                , $this->object->validate("asdf")
        );
    }

    /**
     * Generated from @assert ("*") === false.
     *
     * @covers pgn\tags\WhiteType::validate
     */
    public function testValidate11() {
        $this->assertSame(
                false
                , $this->object->validate("*")
        );
    }

    /**
     * @covers pgn\tags\WhiteType::getName
     * @todo   Implement testGetName().
     */
    public function testGetName() {
        $expected = 'WhiteType';
        $result = $this->object->getName();
        
        $this->assertEquals($expected, $result);
    }

}
