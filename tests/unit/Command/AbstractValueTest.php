<?php

namespace Dhii\Shell\Command;

/**
 * Tests AbstractValue.
 * 
 * @since [*next-version*]
 *
 * @author Dhii Team <development@dhii.co>
 */
class AbstractValueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Creates an instance of an AbstractValue descendant.
     *
     * @since [*next-version*]
     *
     * @return \Dhii\Shell\Command\AbstractValue
     */
    public function createInstance($value = 'argument')
    {
        $value = $this->getMockForAbstractClass('Dhii\Shell\Command\AbstractValue', [$value]);

        return $value;
    }

    /**
     * Tests if a descendant can be initialized, and implements required interfaces.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $value = $this->createInstance();
        $this->assertInstanceOf('Dhii\Shell\Command\ValueInterface', $value, 'Must be a valid value');
    }

    /**
     * Tests if a value can be retrieved in uniform way after it is set at creation time.
     *
     * @since [*next-version*]
     */
    public function testCanGetValueSingle()
    {
        $val = 'my_arg';
        $value = $this->createInstance($val);
        $this->assertEquals((array) $val, $value->getValue(), 'Must be an array representation of the single value');
    }

    /**
     * Tests if values can be retrieved in uniform way after they are set at creation time.
     *
     * @since [*next-version*]
     */
    public function testCanGetValueMultiple()
    {
        $val = ['my_arg1', 'another_arg'];
        $value = $this->createInstance($val);
        $this->assertEquals($val, $value->getValue(), 'Must be an array representation of the multiple values');
    }

    /**
     * Tests if a value can be retrieved as string after it is set at creation time.
     *
     * @since [*next-version*]
     */
    public function testCanGetStringValueSingle()
    {
        $val = 'my_arg2';
        $value = $this->createInstance($val);
        $this->assertEquals($val, (string) $value, 'Must be a string representation of the single value');
    }

    /**
     * Tests if values can be retrieved as a string after they are set at creation time.
     *
     * @since [*next-version*]
     */
    public function testCanGetStringValueMultiple()
    {
        $val = ['my_arg3', 'yet_another_arg'];
        $value = $this->createInstance($val);
        $this->assertEquals(implode(' ', $val), (string) $value, 'Must be a string representation of the multiple values');
    }
}
