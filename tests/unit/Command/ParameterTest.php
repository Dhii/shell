<?php

namespace Dhii\Shell\Test\Command;

use Dhii\Shell\Command;

/**
 * Description of ParameterTest.
 *
 *
 * @author Dhii Team <development@dhii.co>
 */
class ParameterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Useful for centralization of parameter creation.
     *
     * @since [*next-version*]
     *
     * @return \Dhii\Shell\Command\Parameter
     */
    public function createInstance($name = 'parameter', $value = null)
    {
        $parameter = new Command\Parameter($name, $value);

        return $parameter;
    }

    /**
     * Tests whether the parameter implements the required interfaces.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $parameter = $this->createInstance();
        $this->assertInstanceOf('Dhii\Shell\Command\ParameterInterface', $parameter, 'Must be a valid parameter');
    }

    /**
     * Tests whether a name and a value can be assigned to the parameter, and that
     * they will both be correctly reflected in the string representation.
     *
     * @since [*next-version*]
     */
    public function testHasCorrectValueSingle()
    {
        $value = 'yes';
        $parameter = $this->createInstance($value);
        $this->assertEquals(sprintf('%1$s', escapeshellarg($value)), (string) $parameter, 'A parameter must have a correct string representation of its name and value');
    }

    /**
     * Tests whether a name and multiple values can be assigned to the parameter, and that
     * they will all be correctly reflected in the string representation.
     *
     * @since [*next-version*]
     */
    public function testHasCorrectValueMultiple()
    {
        $values = ['yes', 'give me fuel', 'give me fire'];
        $parameter = $this->createInstance($values);
        $this->assertEquals(implode(' ', array_map(
            function ($value) {
                return sprintf('%1$s', escapeshellarg($value));
            }, $values)), (string) $parameter, 'A parameter must have a correct string representation of its name and value');
    }
}
