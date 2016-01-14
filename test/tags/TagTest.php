<?php

namespace pgn\tags;

class StubTag extends Tag {
    public function getName() {
        return get_class();
    }
}

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-07 at 17:14:07.
 */
class TagTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Tag
     */
    protected $object;
    protected $data;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new StubTag;
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
     * @covers pgn\tags\Tag::validate
     */
    public function testValidate_Null() {
        $this->data = null;
        $result = $this->object->validate($this->data);
        
        $this->assertFalse($result);
    }

    /**
     * @covers pgn\tags\Tag::validate
     */
    public function testValidate_Array() {
        $this->data = array('Hello', 'World');
        $result = $this->object->validate($this->data);
        
        $this->assertFalse($result);
    }

    /**
     * @covers pgn\tags\Tag::validate
     */
    public function testValidate_Array2() {
        $this->data = array();
        $result = $this->object->validate($this->data);
        
        $this->assertFalse($result);
    }

    /**
     * @covers pgn\tags\Tag::validate
     */
    public function testValidate_Empty() {
        $this->data = '';
        $result = $this->object->validate($this->data);
        
        $this->assertFalse($result);
    }

    /**
     * @covers pgn\tags\Tag::validate
     */
    public function testValidate_Zero() {
        $this->data = '0';
        $result = $this->object->validate($this->data);
        
        $this->assertTrue($result);
    }

    /**
     * @covers pgn\tags\Tag::validate
     */
    public function testValidate_QuestionMark_OK() {
        $this->data = '?';
        $result = $this->object->validate($this->data);
        
        $this->assertTrue($result);
    }

    /**
     * @covers pgn\tags\Tag::validate
     */
    public function testValidate_DefaultDate_OK() {
        $this->data = '????.??.??';
        $result = $this->object->validate($this->data);
        
        $this->assertTrue($result);
    }

    /**
     * @covers pgn\tags\Tag::set
     * @covers pgn\tags\Tag::get
     * @covers pgn\tags\Tag::validate("a value to set")
     */
    public function testGetAndSet() {
        $this->object->set($this->data);
        $this->assertEquals($this->data, $this->object->get());
    }
    
    /**
     * @expectedException pgn\exceptions\InvalidDataException
     * @cover pgn\tags\Tag::set
     * @cover pgn\exceptions\InvalidDataException
     */
    public function testSetException() {
        $this->data = null;
        $this->object->set($this->data);
    }

    /**
     * @covers pgn\tags\Tag::getDefaultValue
     */
    public function testGetDefaultValue() {
        $this->assertEquals('?', $this->object->getDefaultValue());
    }
    
    /**
     * Based (manual) in @assert('[TestName "Test Value"]') === "TestName"
     * 
     */
    public function testParseTagName1() {
        $this->assertSame("TestName", Tag::parseTagName('[TestName "Test Value"]'));
    }
    
    /**
     * Based (manual) in @assert('[TestName "Test Value"') throws  \pgn\exceptions\InvalidGameFormatException
     * @expectedException \pgn\exceptions\InvalidGameFormatException
     * @expectedExceptionMessage [pgn\tags\Tag]: bad tag format: [TestName "Test Value"
     * 
     */
    public function testParseTagName2() {
        $this->assertSame("TestName", Tag::parseTagName('[TestName "Test Value"'));
    }
    
    /**
     * Based (manual) in @assert('asdf') throws \pgn\exceptions\InvalidGameFormatException
     * @expectedException \pgn\exceptions\InvalidGameFormatException
     * @expectedExceptionMessage [pgn\tags\Tag]: bad tag format: asdf
     */
    public function testParseTagName3() {
        $tagName = Tag::parseTagName('asdf');
    }
    
    /**
     * Based (manual) in @assert('[TestName "Test Value"]') === "Test Value"
     */
    public function testParseTagValue1() {
        $this->assertSame("Test Value", Tag::parseTagValue('[TestName "Test Value"]'));
    }
    
    /**
     * Based (manual) in @assert('[TestName "Test Value"') throws  \pgn\exceptions\InvalidGameFormatException
     * @expectedException \pgn\exceptions\InvalidGameFormatException
     * @expectedExceptionMessage [pgn\tags\Tag]: bad tag format: [TestName "Test Value"
     * 
     */
    public function testParseTagValue2() {
        $this->assertSame("Test Value", Tag::parseTagValue('[TestName "Test Value"'));
    }
    
    /**
     * Based (manual) in @assert('asdf') throws \pgn\exceptions\InvalidGameFormatException
     * @expectedException \pgn\exceptions\InvalidGameFormatException
     * @expectedExceptionMessage [pgn\tags\Tag]: bad tag format: asdf
     */
    public function testParseTagValue3() {
        $tagName = Tag::parseTagValue('asdf');
    }
    
    /**
     * 
     */
    public function testParseDate() {
        $dateTag = new Date;
        $dateTag->set(\DateTime::createFromFormat("d/m/Y", "02/11/1988"));
        
        $unparsedTag = '[Date "1988.11.02"]';
        $errors = null;
        
        $parsed = Tag::parse($unparsedTag, $errors);
        
        echo "errors: ";
        var_dump($errors);
        
        $this->assertInstanceof('pgn\tags\Date', $parsed);
        $this->assertSame($dateTag->get(), $parsed->get());
        $this->assertNotNull($errors);
        $this->assertEquals(0, count($errors));
    }
    
    public function testParseEvent() {
        $eventTag = new Event;
        $eventTag->set("Some Ordinary Event");
        
        $unparsedTag = '[Event "Some Ordinary Event"]';
        $errors = null;
        
        $parsed = Tag::parse($unparsedTag, $errors);
        
        echo "errors: ";
        var_dump($errors);
        
        $this->assertInstanceof('pgn\tags\Event', $parsed);
        $this->assertSame($eventTag->get(), $parsed->get());
        $this->assertNotNull($errors);
        $this->assertEquals(0, count($errors));
    }
    
    /**
     * 
     */
    public function testParseUknown() {
        $uknownTag = new UknownTag();
        $uknownTag->setName("MyUknown");
        $uknownTag->set("Some Ordinary Information");
        
        $unparsedTag = '[MyUknown "Some Ordinary Information"]';
        $errors = null;
        
        $parsed = Tag::parse($unparsedTag, $errors);
        
        echo "errors: ";
        var_dump($errors);
        
        $this->assertInstanceof('pgn\tags\UknownTag', $parsed);
        $this->assertSame($uknownTag->get(), $parsed->get());
        $this->assertSame($uknownTag->getName(), $parsed->getName());
        $this->assertNotNull($errors);
        $this->assertEquals(0, count($errors));
    }
}