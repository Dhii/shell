<?php

namespace Dhii\Shell\Test\Command;

use Dhii\Shell\Command;

/**
 * Description of FlagTest.
 *
 * @return \Dhii\Shell\Command\Flag
 * 
 * @author Dhii Team <development@dhii.co>
 */
class FlagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Useful for centralization of flag creation.
     *
     * @since [*next-version*]
     *
     * @return \Dhii\Shell\Command\Flag
     */
    public function createInstance($name = 'a', $value = null)
    {
        $flag = new Command\Flag($name, $value);

        return $flag;
    }

    /**
     * Tests whether the flag implements the required interfaces.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $flag = $this->createInstance();
        $this->assertInstanceOf('Dhii\Shell\Command\FlagInterface', $flag, 'Must be a valid flag');
    }

    /**
     * Tests whether a name can be assigned to the flag, and that it will be
     * correctly reflected in the string representation.
     *
     * @since [*next-version*]
     */
    public function testHasCorrectName()
    {
        $name = 'l';
        $flag = $this->createInstance($name);
        $this->assertEquals(sprintf('-%1$s', $name), (string) $flag, 'A flag must have a correct string representation of its name');
    }

    /**
     * Tests whether a name and a value can be assigned to the flag, and that
     * they will both be correctly reflected in the string representation.
     *
     * @since [*next-version*]
     */
    public function testHasCorrectValueSingle()
    {
        $name = 'h';
        $value = 'yes';
        $flag = $this->createInstance($name, $value);
        $this->assertEquals(sprintf('-%1$s %2$s', $name, escapeshellarg($value)), (string) $flag, 'A flag must have a correct string representation of its name and value');
    }

    /**
     * Tests whether a name and multiple values can be assigned to the flag, and that
     * they will all be correctly reflected in the string representation.
     *
     * @since [*next-version*]
     */
    public function testHasCorrectValueMultiple()
    {
        $name = 'h';
        $values = ['yes', 'of course', 'give me human readable!!!11'];
        $flag = $this->createInstance($name, $values);
        $this->assertEquals(implode(' ', array_map(
            function ($value) use ($name) {
                return sprintf('-%1$s %2$s', $name, escapeshellarg($value));
            }, $values)), (string) $flag, 'A flag must have a correct string representation of its name and value');
    }
}
