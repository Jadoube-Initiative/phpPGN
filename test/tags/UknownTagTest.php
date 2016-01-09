<?php
namespace pgn\tags;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-18 at 21:33:01.
 */
class UknownTagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UknownTag
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new UknownTag;
        echo __CLASS__ . '::' . $this->getName() . "\n";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @expectedException pgn\exceptions\InvalidClassNameException
     * @expectedExceptionMessage [pgn\tags\UknownTag] bad name: 1.5
     * @covers pgn\tags\UknownTag::setName
     * @covers pgn\exceptions\InvalidClassNameException
     */
    public function testSetName()
    {
        $this->object->setName(1.5);
    }

    /**
     * @expectedException pgn\exceptions\InvalidClassNameException
     * @expectedExceptionMessage [pgn\tags\UknownTag] name was not set for an uknown tag
     * @covers pgn\tags\UknownTag::getName
     * @covers pgn\exceptions\InvalidClassNameException
     */
    public function testGetName()
    {
        $this->object->getName();
    }
    
    /**
     * @covers pgn\tags\UknownTag::getName()
     * @covers pgn\tags\UknownTag::setName()
     */
    public function testGetAndSet_OK() {
        $tagName = 'PlyCount';
        $this->object->setName($tagName);
        $this->assertSame(
                $tagName,
                $this->object->getName()
        );
        
    }
    
    /**
     * @covers pgn\tags\UknownTag::setName()
     * @covers pgn\tags\UknownTag::set()
     * @covers pgn\tags\UknownTag::__toString()
     */
    public function testToString() {
        $tagName = 'PlyCount';
        $this->object->setName($tagName);
        $this->object->set('1');
        $this->assertSame(
                '[PlyCount "1"]',
                $this->object->__toString()
        );
    }
}
