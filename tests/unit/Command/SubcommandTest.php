<?php

namespace Dhii\Shell\Test\Command;

use Dhii\Shell\Command;

/**
 * Tests Subcommand.
 *
 * @since [*next-version*]
 *
 * @author Dhii Team <development@dhii.co>
 */
class SubcommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @since [*next-version*]
     *
     * @param type $name
     *
     * @return \Dhii\Shell\Command\Subcommand
     */
    public function createInstance($name = 'subcommand')
    {
        $subcommand = new Command\Subcommand($name);

        return $subcommand;
    }

    /**
     * Tests if an instance can be initialized, and implements required interfaces.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subcommand = $this->createInstance();
        $this->assertInstanceOf('Dhii\Shell\Command\SubcommandInterface', $subcommand, 'Must be a valid subcommand');
    }

    /**
     * Tests whether a name and a value can be assigned to the subcommand, and that
     * they will both be correctly reflected in the string representation.
     *
     * @since [*next-version*]
     */
    public function testHasCorrectValueSingle()
    {
        $value = 'create';
        $subcommand = $this->createInstance($value);
        $this->assertEquals(sprintf('%1$s', $value), (string) $subcommand, 'A subcommand must have a correct string representation of its name and value');
    }

    /**
     * Tests whether a name and multiple values can be assigned to the subcommand, and that
     * they will all be correctly reflected in the string representation.
     *
     * @since [*next-version*]
     */
    public function testHasCorrectValueMultiple()
    {
        $values = ['install', 'update-index'];
        $subcommand = $this->createInstance($values);
        $this->assertEquals(implode(' ', $values), (string) $subcommand, 'A subcommand must have a correct string representation of its name and value');
    }
}
