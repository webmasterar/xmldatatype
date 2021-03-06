<?php

use XMLDatatype\Date,
    XMLDatatype\Exception\UnexpectedValueException;

class DateTest extends PHPUnit_Framework_TestCase
{
    public function testNormal()
    {
        $a = new Date();
        $d = new \DateTime();
        $this->assertEquals($d->format('Y-m-d'), $a->getValue());
        $a->setValue('2013-02-29');
        $d->setDate(2013, 2, 29);
        $this->assertEquals($d->format('Y-m-d'), $a->getValue());
        $this->assertEquals($d->format('Y-m-d'), $a->toString());
        $b = new Date('2013-02-29+01:00');
        $d = new \DateTime('2013-02-29+01:00');
        $this->assertEquals($d->format('Y-m-dP'), $b->getValue());
        $this->assertEquals($d->format('Y'), $b->getYear());
        $this->assertEquals($d->format('m'), $b->getMonth());
        $this->assertEquals($d->format('d'), $b->getDay());
        $this->assertEquals($d->format('P'), $b->getTimezone());
    }
    
    public function testInvalidA()
    {
        $this->setExpectedException('XMLDatatype\Exception\UnexpectedValueException');
        $a = new Date('spannner');
    }
    
    public function testInvalidB()
    {
        $this->setExpectedException('XMLDatatype\Exception\UnexpectedValueException');
        $a = new Date('2000-01-99');
    }
}
