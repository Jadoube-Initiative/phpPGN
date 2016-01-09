<?php

namespace pgn\tags;

class DateStub extends Date {

    public function formatted($data) {
        return parent::formatted($data);
    }

    public function isBissextile($year) {
        return parent::isBissextile($year);
    }

    public function yearReplaceDefaults($year) {
        return parent::yearReplaceDefaults($year);
    }
    
    public function monthReplaceDefaults($monthPartial) {
        return parent::monthReplaceDefaults($monthPartial);
    }

}

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-04-18 at 12:07:17.
 */
class DateTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Date
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new DateStub();
        echo __CLASS__ . '::' . $this->getName() . "\n";
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * 
     * @covers pgn\tags\Date::__toString
     */
    public function testToString() {
        $str = strval($this->object);
        $this->assertSame(
                '[Date "????.??.??"]', $str
        );
    }
    
    /**
     * Generated from @assert ("????.??.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate() {
        $this->assertSame(
                true, $this->object->validate("????.??.??")
        );
    }

    /**
     * Generated from @assert ("0000.??.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate2() {
        $this->assertSame(
                true, $this->object->validate("0000.??.??")
        );
    }

    /**
     * Generated from @assert ("????.??.4?") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate3() {
        $this->assertSame(
                false, $this->object->validate("????.??.4?")
        );
    }

    /**
     * Generated from @assert ("9999.?9.31") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate4() {
        $this->assertSame(
                false, $this->object->validate("9999.?9.31")
        );
    }

    /**
     * Generated from @assert ("9999.?9.30") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate5() {
        $this->assertSame(
                true
                , $this->object->validate("9999.?9.30")
        );
    }

    /**
     * Generated from @assert ("????.2?.??") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate6() {
        $this->assertSame(
                false
                , $this->object->validate("????.2?.??")
        );
    }

    /**
     * Generated from @assert ("????.1?.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate7() {
        $this->assertSame(
                true
                , $this->object->validate("????.1?.??")
        );
    }

    /**
     * Generated from @assert ("????.0?.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate8() {
        $this->assertSame(
                true
                , $this->object->validate("????.0?.??")
        );
    }

    /**
     * Generated from @assert ("????.03.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate9() {
        $this->assertSame(
                true
                , $this->object->validate("????.03.??")
        );
    }

    /**
     * Generated from @assert ("????.02.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate10() {
        $this->assertSame(
                true
                , $this->object->validate("????.02.??")
        );
    }

    /**
     * Generated from @assert ("0001.02.?1") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate11() {
        $this->assertSame(
                true
                , $this->object->validate("0001.02.?1")
        );
    }

    /**
     * Generated from @assert ("????.02.3?") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate12() {
        $this->assertSame(
                false
                , $this->object->validate("????.02.3?")
        );
    }

    /**
     * Generated from @assert ("????.02.1?") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate13() {
        $this->assertSame(
                true
                , $this->object->validate("????.02.1?")
        );
    }

    /**
     * Generated from @assert ("????.02.2?") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate14() {
        $this->assertSame(
                true
                , $this->object->validate("????.02.2?")
        );
    }

    /**
     * Generated from @assert ("????.02.29") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate15() {
        $this->assertSame(
                true
                , $this->object->validate("????.02.29")
        );
    }

    /**
     * Generated from @assert ("1992.08.31") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate16() {
        $this->assertSame(
                true
                , $this->object->validate("1992.08.31")
        );
    }

    /**
     * Generated from @assert ("2015.11.2?") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate17() {
        $this->assertSame(
                true
                , $this->object->validate("2015.11.2?")
        );
    }

    /**
     * Generated from @assert ("2015.11.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate18() {
        $this->assertSame(
                true
                , $this->object->validate("2015.11.??")
        );
    }

    /**
     * Generated from @assert ("2015.1?.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate19() {
        $this->assertSame(
                true
                , $this->object->validate("2015.1?.??")
        );
    }

    /**
     * Generated from @assert ("2015.??.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate20() {
        $this->assertSame(
                true
                , $this->object->validate("2015.??.??")
        );
    }

    /**
     * Generated from @assert ("201?.??.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate21() {
        $this->assertSame(
                true
                , $this->object->validate("201?.??.??")
        );
    }

    /**
     * Generated from @assert ("20??.??.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate22() {
        $this->assertSame(
                true
                , $this->object->validate("20??.??.??")
        );
    }

    /**
     * Generated from @assert ("2???.??.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate23() {
        $this->assertSame(
                true
                , $this->object->validate("2???.??.??")
        );
    }

    /**
     * Generated from @assert (new \DateTime) === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate24() {
        $this->assertSame(
                true
                , $this->object->validate(new \DateTime)
        );
    }

    /**
     * Generated from @assert ("1992.0?.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate25() {
        $this->assertSame(
                true
                , $this->object->validate("1992.0?.??")
        );
    }

    /**
     * Generated from @assert ("1992.02.3?") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate26() {
        $this->assertSame(
                false
                , $this->object->validate("1992.02.3?")
        );
    }

    /**
     * Generated from @assert ("1992.4?.??") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate27() {
        $this->assertSame(
                false
                , $this->object->validate("1992.4?.??")
        );
    }

    /**
     * Generated from @assert ("1992.1?.??") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate28() {
        $this->assertSame(
                true
                , $this->object->validate("1992.1?.??")
        );
    }

    /**
     * Generated from @assert ("1992.31.08") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate29() {
        $this->assertSame(
                false
                , $this->object->validate("1992.31.08")
        );
    }

    /**
     * Generated from @assert ("08.31.1992") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate30() {
        $this->assertSame(
                false
                , $this->object->validate("08.31.1992")
        );
    }

    /**
     * Generated from @assert ("08/31/1992") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate31() {
        $this->assertSame(
                false
                , $this->object->validate("08/31/1992")
        );
    }

    /**
     * Generated from @assert ("1992/08/31") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate32() {
        $this->assertSame(
                false
                , $this->object->validate("1992/08/31")
        );
    }

    /**
     * Generated from @assert (null) === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate33() {
        $this->assertSame(
                false
                , $this->object->validate(null)
        );
    }

    /**
     * Generated from @assert (new \stdClass) === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate34() {
        $this->assertSame(
                false
                , $this->object->validate(new \stdClass)
        );
    }

    /**
     * Generated from @assert (array (1988,11,02)) === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate35() {
        $this->assertSame(
                false
                , $this->object->validate(array(1988, 11, 02))
        );
    }

    /**
     * Generated from @assert ("aabb.vv.aa") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate36() {
        $this->assertSame(
                false
                , $this->object->validate("aabb.vv.aa")
        );
    }

    /**
     * Generated from @assert ("??11.02.29") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate37() {
        $this->assertSame(
                false
                , $this->object->validate("??11.02.29")
        );
    }

    /**
     * Generated from @assert ("??12.02.29") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate38() {
        $this->assertSame(
                true
                , $this->object->validate("??12.02.29")
        );
    }

    /**
     * Generated from @assert ("??14.02.29") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate39() {
        $this->assertSame(
                false
                , $this->object->validate("??14.02.29")
        );
    }

    /**
     * Generated from @assert ("??16.02.29") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate40() {
        $this->assertSame(
                true
                , $this->object->validate("??16.02.29")
        );
    }

    /**
     * Generated from @assert ("??18.02.29") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate41() {
        $this->assertSame(
                false
                , $this->object->validate("??18.02.29")
        );
    }

    /**
     * Generated from @assert ("??20.02.29") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate42() {
        $this->assertSame(
                true
                , $this->object->validate("??20.02.29")
        );
    }

    /**
     * Generated from @assert ("??22.02.29") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate43() {
        $this->assertSame(
                false
                , $this->object->validate("??22.02.29")
        );
    }

    /**
     * Generated from @assert ("??24.02.29") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate44() {
        $this->assertSame(
                true
                , $this->object->validate("??24.02.29")
        );
    }

    /**
     * Generated from @assert ("??26.02.29") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate45() {
        $this->assertSame(
                false
                , $this->object->validate("??26.02.29")
        );
    }

    /**
     * Generated from @assert ("??28.02.29") === true.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate46() {
        $this->assertSame(
                true
                , $this->object->validate("??28.02.29")
        );
    }

    /**
     * Generated from @assert ("2015.02.29") === false.
     * @group validate
     * @covers pgn\tags\Date::validate
     */
    public function testValidate47() {
        $this->assertSame(
                false
                , $this->object->validate("2015.02.29")
        );
    }

    /**
     * Generated from @assert () == "????.??.??".
     * @group validate
     * @covers pgn\tags\Date::getDefaultValue
     */
    public function testGetDefaultValue() {
        $this->assertEquals(
                "????.??.??"
                , $this->object->getDefaultValue()
        );
    }

    /**
     * Generated from @assert () == "Date".
     * @group validate
     * @covers pgn\tags\Date::getName
     */
    public function testGetName() {
        $this->assertEquals(
                "Date"
                , $this->object->getName()
        );
    }

    /**
     * Generated from @assert (null) === '????.??.??'.
     * @group formatted
     * @covers pgn\tags\Date::formatted
     */
    public function testFormatted() {
        $this->assertSame(
                '????.??.??'
                , $this->object->formatted(null)
        );
    }

    /**
     * Generated from @assert ("1988.02.11") === '1988.02.11'.
     * @group formatted
     * @covers pgn\tags\Date::formatted
     */
    public function testFormatted2() {
        $this->assertSame(
                '1988.02.11'
                , $this->object->formatted("1988.02.11")
        );
    }

    /**
     * Generated from @assert (\DateTime::createFromFormat('d/m/Y', '02/11/1988')) === '1988.11.02'.
     * @group formatted
     * @covers pgn\tags\Date::formatted
     */
    public function testFormatted3() {
        $this->assertSame(
                '1988.11.02'
                , $this->object->formatted(\DateTime::createFromFormat('d/m/Y', '02/11/1988'))
        );
    }

    /**
     * Generated from @assert ("????") === '1124'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults() {
        $this->assertSame(
		'1124', $this->object->yearReplaceDefaults("????")
        );
    }

    /**
     * Generated from @assert ("19??") === '1924'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults2() {
        $this->assertSame(
		'1924', $this->object->yearReplaceDefaults("19??")
        );
    }

    /**
     * Generated from @assert ("1???") === '1124'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults3() {
        $this->assertSame(
		'1124', $this->object->yearReplaceDefaults("1???")
        );
    }

    /**
     * Generated from @assert ("2???") === '2124'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults4() {
        $this->assertSame(
		'2124', $this->object->yearReplaceDefaults("2???")
        );
    }

    /**
     * Generated from @assert ("?0??") === '1024'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults5() {
        $this->assertSame(
		'1024', $this->object->yearReplaceDefaults("?0??")
        );
    }

    /**
     * Generated from @assert ("20?6") === '2016'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults6() {
        $this->assertSame(
		'2016', $this->object->yearReplaceDefaults("20?6")
        );
    }

    /**
     * Generated from @assert ("20?4") === '2024'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults7() {
        $this->assertSame(
		'2024', $this->object->yearReplaceDefaults("20?4")
        );
    }

    /**
     * Generated from @assert ("198?") === '1984'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults8() {
        $this->assertSame(
		'1984', $this->object->yearReplaceDefaults("198?")
        );
    }

    /**
     * Generated from @assert ("??11") === '1111'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults9() {
        $this->assertSame(
		'1111', $this->object->yearReplaceDefaults("??11")
        );
    }

    /**
     * Generated from @assert ("??12") === '1112'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults10() {
        $this->assertSame(
		'1112', $this->object->yearReplaceDefaults("??12")
        );
    }

    /**
     * Generated from @assert ("??14") === '1114'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults11() {
        $this->assertSame(
		'1114', $this->object->yearReplaceDefaults("??14")
        );
    }

    /**
     * Generated from @assert ("??16") === '1116'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults12() {
        $this->assertSame(
		'1116', $this->object->yearReplaceDefaults("??16")
        );
    }

    /**
     * Generated from @assert ("??18") === '1118'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults13() {
        $this->assertSame(
		'1118', $this->object->yearReplaceDefaults("??18")
        );
    }

    /**
     * Generated from @assert ("??20") === '1120'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults14() {
        $this->assertSame(
		'1120', $this->object->yearReplaceDefaults("??20")
        );
    }

    /**
     * Generated from @assert ("??22") === '1122'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults15() {
        $this->assertSame(
		'1122', $this->object->yearReplaceDefaults("??22")
        );
    }

    /**
     * Generated from @assert ("??24") === '1124'.
     *
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults16() {
        $this->assertSame(
		'1124', $this->object->yearReplaceDefaults("??24")
        );
    }

    /**
     * Generated from @assert ("??26") === '1126'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults17() {
        $this->assertSame(
		'1126', $this->object->yearReplaceDefaults("??26")
        );
    }

    /**
     * Generated from @assert ("??28") === '1128'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults18() {
        $this->assertSame(
		'1128', $this->object->yearReplaceDefaults("??28")
        );
    }

    /**
     * Generated from @assert ("0000") === '0000'.
     * @group yearReplaceDefaults
     * @covers pgn\tags\Date::yearReplaceDefaults
     */
    public function testYearReplaceDefaults19() {
        $this->assertSame(
		'0000', $this->object->yearReplaceDefaults("0000")
        );
    }

    /**
     * Generated from @assert ('??') === '11'.
     *
     * @covers pgn\tags\Date::monthReplaceDefaults
     */
    public function testMonthReplaceDefaults() {
        $this->assertSame(
                '11'
                , $this->object->monthReplaceDefaults('??')
        );
    }

    /**
     * Generated from @assert ('?0') === '10'.
     *
     * @covers pgn\tags\Date::monthReplaceDefaults
     */
    public function testMonthReplaceDefaults2() {
        $this->assertSame(
                '10'
                , $this->object->monthReplaceDefaults('?0')
        );
    }

    /**
     * Generated from @assert ('?2') === '12'.
     *
     * @covers pgn\tags\Date::monthReplaceDefaults
     */
    public function testMonthReplaceDefaults3() {
        $this->assertSame(
                '12'
                , $this->object->monthReplaceDefaults('?2')
        );
    }

    /**
     * Generated from @assert ('?3') === '03'.
     *
     * @covers pgn\tags\Date::monthReplaceDefaults
     */
    public function testMonthReplaceDefaults4() {
        $this->assertSame(
                '03'
                , $this->object->monthReplaceDefaults('?3')
        );
    }

    /**
     * Generated from @assert ('?9') === '09'.
     *
     * @covers pgn\tags\Date::monthReplaceDefaults
     */
    public function testMonthReplaceDefaults5() {
        $this->assertSame(
                '09'
                , $this->object->monthReplaceDefaults('?9')
        );
    }

    /**
     * Generated from @assert ("2015") === false.
     * @group isBissextile
     * @covers pgn\tags\Date::isBissextile
     */
    public function testIsBissextile() {
        $this->assertSame(
		false, $this->object->isBissextile("2015")
        );
    }

    /**
     * Generated from @assert ("2014") === false.
     * @group isBissextile
     * @covers pgn\tags\Date::isBissextile
     */
    public function testIsBissextile2() {
        $this->assertSame(
		false, $this->object->isBissextile("2014")
        );
    }

    /**
     * Generated from @assert ("0004") === true.
     * @group isBissextile
     * @covers pgn\tags\Date::isBissextile
     */
    public function testIsBissextile3() {
        $this->assertSame(
		true, $this->object->isBissextile("0004")
        );
    }

    /**
     * Generated from @assert ("0008") === true.
     * @group isBissextile
     * @covers pgn\tags\Date::isBissextile
     */
    public function testIsBissextile4() {
        $this->assertSame(
		true, $this->object->isBissextile("0008")
        );
    }

    /**
     * Generated from @assert ("1000") === false.
     * @group isBissextile
     * @covers pgn\tags\Date::isBissextile
     */
    public function testIsBissextile5() {
        $this->assertSame(
		false, $this->object->isBissextile("1000")
        );
    }

    /**
     * Generated from @assert ("2000") === true.
     * @group isBissextile
     * @covers pgn\tags\Date::isBissextile
     */
    public function testIsBissextile6() {
        $this->assertSame(
		true, $this->object->isBissextile("2000")
        );
    }

    /**
     * Generated from @assert ("2016") === true.
     * @group isBissextile
     * @covers pgn\tags\Date::isBissextile
     */
    public function testIsBissextile7() {
        $this->assertSame(
		true, $this->object->isBissextile("2016")
        );
    }

    /**
     * Generated from @assert ("2012") === true.
     * @group isBissextile
     * @covers pgn\tags\Date::isBissextile
     */
    public function testIsBissextile8() {
        $this->assertSame(
		true, $this->object->isBissextile("2012")
        );
    }

}
