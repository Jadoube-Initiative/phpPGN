<?php

namespace pgn\tags;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-01-11 at 08:33:30.
 */
class FENTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var FEN
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new FEN;
        echo __CLASS__ . '::' . $this->getName() . "\n";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * Generated from @assert ("rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1") === true.
     *
     * @covers pgn\tags\FEN::validate
     */
    public function testValidate() {
        $this->assertSame(
                true
                , $this->object->validate("rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1")
        );
    }

    /**
     * Generated from @assert ("rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1") === true.
     *
     * @covers pgn\tags\FEN::validate
     */
    public function testValidate2() {
        $this->assertSame(
                true
                , $this->object->validate("rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1")
        );
    }

    /**
     * Generated from @assert ("rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2") === true.
     *
     * @covers pgn\tags\FEN::validate
     */
    public function testValidate3() {
        $this->assertSame(
                true
                , $this->object->validate("rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2")
        );
    }

    /**
     * Generated from @assert ("rnbqkbnr/pp1ppppp/8/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2") === true.
     *
     * @covers pgn\tags\FEN::validate
     */
    public function testValidate4() {
        $this->assertSame(
                true
                , $this->object->validate("rnbqkbnr/pp1ppppp/8/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2")
        );
    }

    /**
     * Generated from @assert ("4k3/8/8/8/8/8/4P3/4K3 w - - 5 39") === true.
     *
     * @covers pgn\tags\FEN::validate
     */
    public function testValidate5() {
        $this->assertSame(
                true
                , $this->object->validate("4k3/8/8/8/8/8/4P3/4K3 w - - 5 39")
        );
    }

    /**
     * Generated from @assert ("Prq1823Br b kqKQ 1 1 1") === false.
     *
     * @covers pgn\tags\FEN::validate
     */
    public function testValidate6() {
        $this->assertSame(
                false
                , $this->object->validate("Prq1823Br b kqKQ 1 1 1")
        );
    }

    /**
     * Generated from @assert (2) === false.
     *
     * @covers pgn\tags\FEN::validate
     */
    public function testValidate7() {
        $this->assertSame(
                false
                , $this->object->validate(2)
        );
    }

    /**
     * Generated from @assert ("a") === false.
     *
     * @covers pgn\tags\FEN::validate
     */
    public function testValidate8() {
        $this->assertSame(
                false
                , $this->object->validate("a")
        );
    }

    /**
     * Generated from @assert (NULL) === false.
     *
     * @covers pgn\tags\FEN::validate
     */
    public function testValidate9() {
        $this->assertSame(
                false
                , $this->object->validate(NULL)
        );
    }

    /**
     * @covers pgn\tags\FEN::getName
     * @todo   Implement testGetName().
     */
    public function testGetName() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers pgn\tags\FEN::validPattern
     * @todo   Implement testValidPattern().
     */
    public function testValidPattern() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
