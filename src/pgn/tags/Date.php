<?php
/* 
 * Copyright (c) 2016 Geraldo B. Landre
 * 
 * See the file LICENSE for copying permission.
 */
namespace pgn\tags;

use utils\Parser;

/**
 * Description of Date:
 * The Date tag value gives the starting date for the game.  (Note: this is not
 * necessarily the same as the starting date for the event.)  The date is given
 * with respect to the local time of the site given in the Event tag.  The Date
 * tag value field always uses a standard ten character format: "YYYY.MM.DD".  The
 * first four characters are digits that give the year, the next character is a
 * period, the next two characters are digits that give the month, the next
 * character is a period, and the final two characters are digits that give the
 * day of the month.  If the any of the digit fields are not known, then question
 * marks are used in place of the digits.
 * @see pgn_standard.txt
 * @author Geraldo
 */
class Date extends Tag {
    static private $ERROR_MESSAGE = "Date should be formatted [Y.m.d] Example: 1992.08.31";

    /**
     * 
     * @assert ("????.??.??") === true
     * Convention: year zero is valid:
     * @assert ("0000.??.??") === true
     * @assert ("????.??.4?") === false
     * @assert ("9999.?9.31") === false
     * @assert ("9999.?9.30") === true
     * @assert ("????.2?.??") === false
     * @assert ("????.1?.??") === true
     * @assert ("????.0?.??") === true
     * @assert ("????.03.??") === true
     * @assert ("????.02.??") === true
     * @assert ("0001.02.?1") === true
     * @assert ("????.02.3?") === false
     * @assert ("????.02.1?") === true
     * @assert ("????.02.2?") === true
     * @assert ("????.02.29") === true
     * @assert ("1992.08.31") === true
     * @assert ("2015.11.2?") === true
     * @assert ("2015.11.??") === true
     * @assert ("2015.1?.??") === true
     * @assert ("2015.??.??") === true
     * @assert ("201?.??.??") === true
     * @assert ("20??.??.??") === true
     * @assert ("2???.??.??") === true
     * @assert (new \DateTime) === true
     * @assert ("1992.0?.??") === true
     * @assert ("1992.02.3?") === false
     * @assert ("1992.4?.??") === false
     * @assert ("1992.1?.??") === true
     * @assert ("1992.31.08") === false
     * @assert ("08.31.1992") === false
     * @assert ("08/31/1992") === false
     * @assert ("1992/08/31") === false
     * @assert (null) === false
     * @assert (new \stdClass) === false
     * @assert (array (1988,11,02)) === false
     * @assert ("aabb.vv.aa") === false
     * Testes relacionados a anos bissextos
     * @assert ("??11.02.29") === false
     * @assert ("??12.02.29") === true
     * @assert ("??14.02.29") === false
     * @assert ("??16.02.29") === true
     * @assert ("??18.02.29") === false
     * @assert ("??20.02.29") === true
     * @assert ("??22.02.29") === false
     * @assert ("??24.02.29") === true
     * @assert ("??26.02.29") === false
     * @assert ("??28.02.29") === true
     * @assert ("2015.02.29") === false
     * 
     * @todo to assert errorMsg contents after each test
     * 
     * @param \DateTime $date
     * @return boolean returns true if data is a valid Date
     */
    public function validate($date) {

        if ($date instanceof \DateTime) {
            return true;
        }

        if (!$this->checkFormat($date)) {
            return false;
        }

        list($yearPartial, $monthPartial, $dayPartial) = explode(".", strval($date));

        // 1 is better for default values in day and month
        $day = str_replace('?', '1', $dayPartial);
        $month = $this->monthReplaceDefaults($monthPartial);
        $year = $this->yearReplaceDefaults($yearPartial);

        // special case
        if ($month == 2 && $day == 29) {
            return $this->isBissextile($year);
        }
        
        $d = \DateTime::createFromFormat('Y.m.d', "$year.$month.$day");
        $errors = \DateTime::getLastErrors();
        
        $isValid = ($d !== false && empty($errors['warnings']));

        $this->errorMsg = ($isValid) ? self::$ERROR_MESSAGE : '';
        return $isValid;
    }

    /**
     * @assert () == "????.??.??"
     * 
     * @return string Default Date Value
     */
    public function getDefaultValue() {
        return '????.??.??';
    }

    /**
     * @assert () == "Date"
     * 
     * @return string the name of the tag
     */
    public function getName() {
        $parsed = Parser::parseClassName(get_class());
        return $parsed['className'];
    }

    /**
     * @assert (null) === '????.??.??'
     * @assert ("1988.02.11") === '1988.02.11'
     * @assert (\DateTime::createFromFormat('d/m/Y', '02/11/1988')) === '1988.11.02'
     * 
     * @param \DateTime|string $data
     * @return string
     */
    protected function formatted($data) {
        if (isset($data)) {
            if ($data instanceof \DateTime) {
                return $data->format('Y.m.d');
            } else {
                return strval($data);
            }
        }
        return $this->getDefaultValue();
    }

    /**
     * WARNING: this method takes on $year having only numbers or question marks
     * 
     * @assert ("????") === '1124'
     * @assert ("19??") === '1924'
     * @assert ("1???") === '1124'
     * @assert ("2???") === '2124'
     * @assert ("?0??") === '1024'
     * @assert ("20?6") === '2016'
     * @assert ("20?4") === '2024'
     * @assert ("198?") === '1984'
     * @assert ("??11") === '1111'
     * @assert ("??12") === '1112'
     * @assert ("??14") === '1114'
     * @assert ("??16") === '1116'
     * @assert ("??18") === '1118'
     * @assert ("??20") === '1120'
     * @assert ("??22") === '1122'
     * @assert ("??24") === '1124'
     * @assert ("??26") === '1126'
     * @assert ("??28") === '1128'
     * @assert ("0000") === '0000'
     * 
     * @param string $year
     * @return string the year with question marks replaced by default values
     */
    protected function yearReplaceDefaults($year) {
        // first two digits are useless on verification
        // that's why they are replaced by 1
        $century = str_replace('?', 1, substr($year, 0, 2));

        // the third digit can be even or odd
        // if it's even (or zero) and with the 4th digit being (0, 4 or 8) than 
        //     it may be bissextile
        // if it's odd and with the 4th digit being (2 or 6) than 
        //     it also may be bissextile
        // default value is 1, because odd is easier
        $decade = $year[2];
        if ($year[2] == '?') {
            if ($year[3] != '?') {
                $decade = ($year[3] == 2 || $year[3] == 6) ? 1 : 2;
            } else {
                $decade = 2;
            }
        }

        // assumes that third digit is even...
        $defaultUnity = 4;
        // if third digit is odd
        if ($decade % 2 != 0) {
            $defaultUnity = 2;
        }

        $unity = ($year[3] != '?') ? $year[3] : $defaultUnity;

        return $century . $decade . $unity;
    }

    /**
     * @assert ('??') === '11'
     * @assert ('?0') === '10'
     * @assert ('?2') === '12'
     * @assert ('?3') === '03'
     * @assert ('?9') === '09'
     * 
     * @param string $monthPartial with two characters
     * @return string
     */
    protected function monthReplaceDefaults($monthPartial) {
        $tens = $monthPartial[0];
        $unity = $monthPartial[1] != '?' ? $monthPartial[1] : '1';
        
        if ($tens == '?') {
            if ($unity <= 2) {
                $tens = '1';
            } else {
                $tens = '0';
            }
        }

        $newMonth = $tens . $unity;
        return $newMonth;
    }

    /**
     * WARNING: this method takes on $year having only numbers or question marks
     * 
     * @assert ("2015") === false
     * @assert ("2014") === false
     * @assert ("0004") === true
     * @assert ("0008") === true
     * @assert ("1000") === false
     * @assert ("2000") === true
     * @assert ("2016") === true
     * @assert ("2012") === true
     * @param string $year
     * @return boolean true if a given year is bissextile
     */
    protected function isBissextile($year) {

        // return ( ( ano % 4 == 0 && ano % 100 != 0 ) || ano % 400 == 0 )
        if ($year % 400 == 0) {
            return true;
        }

        if ($year % 4 == 0) {
            if ($year % 100 != 0) {
                return true;
            }
        }

        return false;
    }

    private function checkFormat($date) {
        if (!is_string($date) || !preg_match_all("/^" . self::validPattern() . "$/", $date)) {
            $this->errorMsg = self::$ERROR_MESSAGE;
            return false;
        }
        return true;
    }
    
    /**
     * 
     * @return string Valid Regular Expression Pattern for PGN Dates
     */
    static public function validPattern() {
        return "(\d|\?){4}\.(\d|\?){2}\.(\d|\?){2}";
    }
}
