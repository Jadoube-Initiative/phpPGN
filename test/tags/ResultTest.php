<?php

namespace pgn\tags;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-18 at 20:41:12.
 */
class ResultTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Result
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Result;
        echo __CLASS__ . '::' . $this->getName() . "\n";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * Generated from @assert () === 'Result'.
     *
     * @covers pgn\tags\Result::getName
     */
    public function testGetName() {
        $this->assertSame(
                'Result'
                , $this->object->getName()
        );
    }

    /**
     * Generated from @assert ('0-1') === true.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate() {
        $this->assertSame(
                true
                , $this->object->validate('0-1')
        );
    }

    /**
     * Generated from @assert ('1-0') === true.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate2() {
        $this->assertSame(
                true
                , $this->object->validate('1-0')
        );
    }

    /**
     * Generated from @assert ('1/2-1/2') === true.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate3() {
        $this->assertSame(
                true
                , $this->object->validate('1/2-1/2')
        );
    }

    /**
     * Generated from @assert ('*') === true.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate4() {
        $this->assertSame(
                true
                , $this->object->validate('*')
        );
    }

    /**
     * Generated from @assert ('O-1') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate5() {
        $this->assertSame(
                false
                , $this->object->validate('O-1')
        );
    }

    /**
     * Generated from @assert ('1-O') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate6() {
        $this->assertSame(
                false
                , $this->object->validate('1-O')
        );
    }

    /**
     * Generated from @assert ('0.5-0.5') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate7() {
        $this->assertSame(
                false
                , $this->object->validate('0.5-0.5')
        );
    }

    /**
     * Generated from @assert ('?') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate8() {
        $this->assertSame(
                false
                , $this->object->validate('?')
        );
    }

    /**
     * Generated from @assert ('0-10-1') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate9() {
        $this->assertSame(
                false
                , $this->object->validate('0-10-1')
        );
    }

    /**
     * Generated from @assert ('0-11-0') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate10() {
        $this->assertSame(
                false
                , $this->object->validate('0-11-0')
        );
    }

    /**
     * Generated from @assert ('1-00-1') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate11() {
        $this->assertSame(
                false
                , $this->object->validate('1-00-1')
        );
    }

    /**
     * Generated from @assert ('1-01-0') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate12() {
        $this->assertSame(
                false
                , $this->object->validate('1-01-0')
        );
    }

    /**
     * Generated from @assert ('1/2-1/21/2-1/2') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate13() {
        $this->assertSame(
                false
                , $this->object->validate('1/2-1/21/2-1/2')
        );
    }

    /**
     * Generated from @assert ('**') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate14() {
        $this->assertSame(
                false
                , $this->object->validate('**')
        );
    }

    /**
     * Generated from @assert ('1/2-1/2*') === false.
     *
     * @covers pgn\tags\Result::validate
     */
    public function testValidate15() {
        $this->assertSame(
                false
                , $this->object->validate('1/2-1/2*')
        );
    }

    /**
     * Generated from @assert ('0-1*') === false.
     * 
     * @covers pgn\tags\Result::validate
     */
    public function testValidate16() {
        $this->assertSame(
                false
                , $this->object->validate('0-1*')
        );
    }

    /**
     * Generated from @assert () === '*'.
     *
     * @covers pgn\tags\Result::getDefaultValue
     */
    public function testGetDefaultValue() {
        $this->assertSame(
                '*'
                , $this->object->getDefaultValue()
        );
    }

}