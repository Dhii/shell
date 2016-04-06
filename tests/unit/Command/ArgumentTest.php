<?php

namespace Dhii\Shell\Test\Command;

use Dhii\Shell\Command;

/**
 * Description of ArgumentTest.
 *
 *
 * @author Dhii Team <development@dhii.co>
 */
class ArgumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Useful for centralization of argument creation.
     *
     * @since [*next-version*]
     *
     * @return \Dhii\Shell\Command\Argument
     */
    public function createInstance($name = 'a', $value = null)
    {
        $argument = new Command\Argument($name, $value);

        return $argument;
    }

    /**
     * Tests whether the argument implements the required interfaces.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $argument = $this->createInstance();
        $this->assertInstanceOf('Dhii\Shell\Command\ArgumentInterface', $argument, 'Must be a valid argument');
    }

    /**
     * Tests whether a name can be assigned to the argument, and that it will be
     * correctly reflected in the string representation.
     *
     * @since [*next-version*]
     */
    public function testHasCorrectName()
    {
        $name = 'l';
        $argument = $this->createInstance($name);
        $this->assertEquals(sprintf('--%1$s', $name), (string) $argument, 'An argument must have a correct string representation of its name');
    }

    /**
     * Tests whether a name and a value can be assigned to the argument, and that
     * they will both be correctly reflected in the string representation.
     *
     * @since [*next-version*]
     */
    public function testHasCorrectValueSingle()
    {
        $name = 'h';
        $value = 'yes';
        $argument = $this->createInstance($name, $value);
        $this->assertEquals(sprintf('--%1$s %2$s', $name, escapeshellarg($value)), (string) $argument, 'A argument must have a correct string representation of its name and value');
    }

    /**
     * Tests whether a name and multiple values can be assigned to the argument, and that
     * they will all be correctly reflected in the string representation.
     *
     * @since [*next-version*]
     */
    public function testHasCorrectValueMultiple()
    {
        $name = 'h';
        $values = ['yes', 'of course', 'give me human readable!!!11'];
        $argument = $this->createInstance($name, $values);
        $this->assertEquals(implode(' ', array_map(
            function ($value) use ($name) {
                return sprintf('--%1$s %2$s', $name, escapeshellarg($value));
            }, $values)), (string) $argument, 'A argument must have a correct string representation of its name and value');
    }
}
