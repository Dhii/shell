<?php

namespace Dhii\Shell\Command\Test;

use Dhii\Shell\Command;

/**
 * Description of NamedValueAbstract.
 *
 * @since [*next-version*]
 *
 * @author Dhii Team <development@dhii.co>
 */
class AbstractNamedValueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @since [*next-version*]
     *
     * @param string       $name
     * @param string|array $value
     *
     * @return Command\NamedValueAbstract
     */
    public function createInstance($name, $value = null)
    {
        $valueMock = $this->getMockForAbstractClass('\\Dhii\\Shell\\Command\\AbstractNamedValue', [$name, $value]);

        return $valueMock;
    }

    /**
     * Tests if an instance of a descendant of the abstract named value can
     * be created, and will be of a valid type.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $this->assertInstanceOf('\\Dhii\\Shell\\Command\\NamedValueInterface', $this->createInstance('f', '1'), 'Named value must be of a valid type');
    }

    /**
     * Test if an instance of a descendant of the abstract named value can
     * have the name assigned via the constructor, and retrieved later.
     *
     * @since [*next-version*]
     */
    public function testCanSetRetrieveName()
    {
        $value = 'asd';
        $instance = $this->createInstance($value);
        $this->assertEquals($value, $instance->getName(), 'The name must be settable via the constructor, and retrievable');
    }

    /**
     * Tests if an isntance of a descendant of the abstract named value
     * can retrieve the prefixed name correctly.
     * We don't know what the prefix is, but can assume that the prefixed
     * name must at least contain the name.
     *
     * @since [*next-version*]
     */
    public function testCanGetPrefixedName()
    {
        $value = 'qwe';
        $instance = $this->createInstance($value);
        $this->assertEquals(sprintf('%1$s%2$s', $instance->getPrefix(), $value), $instance->getPrefixedName(), 'The prefixed name must contain the name');
    }

    /**
     * Tests if a single value passed to constructor can later be retrieved
     * in the form of an array.
     *
     * @since [*next-version*]
     */
    public function testCanGetRawValueSingle()
    {
        $value = 'zxc';
        $instance = $this->createInstance('c', $value);
        $this->assertEquals([$value], $instance->getValue(), 'Value must be an array of all passed values');
    }

    /**
     * Tests if multiple values passed to constructor can later be retrieved
     * in the form of an array.
     *
     * @since [*next-version*]
     */
    public function testCanGetRawValueMultiple()
    {
        $value = ['zxc', 'rty'];
        $instance = $this->createInstance('d', $value);
        $this->assertEquals($value, $instance->getValue(), 'Value must be an array of all passed values');
    }

    /**
     * Tests if the correct values string is produced given a single value.
     *
     * @since [*next-version*]
     */
    public function testCanRetrieveValuesSingle()
    {
        $name = 'e';
        $value = 'zxc';
        $instance = $this->createInstance($name, $value);
        $this->assertEquals(sprintf('%1$s%2$s %3$s', $instance->getPrefix(), $name, escapeshellarg($value)), $instance->getValues(), 'Value must be a string representation of the named value');
    }

    /**
     * Tests if the correct values string is produced given multiple values.
     *
     * @since [*next-version*]
     */
    public function testCanRetrieveValuesMultiple()
    {
        $name = 'g';
        $value = ['rty', 'dfg'];
        $instance = $this->createInstance($name, $value);
        $this->assertEquals(
            sprintf('%1$s%2$s %3$s %1$s%2$s %4$s', $instance->getPrefix(), $name, escapeshellarg($value[0]), escapeshellarg($value[1])),
            $instance->getValues(),
            'Value must be a string representation of the named value'
        );
    }

    /**
     * Tests whether a single shell argument is correctly escaped.
     *
     * @since [*next-version*]
     */
    public function testCanEscapeShellArgSingle()
    {
        $value = 'tyu';
        $instance = $this->createInstance('h', '123');
        $this->assertEquals(escapeshellarg($value), $instance->escapeShellArg($value), 'Must be a single shell-arg-escaped string');
    }

    /**
     * Tests whether multiple shell arguments are correctly escaped.
     *
     * @since [*next-version*]
     */
    public function testCanEscapeShellArgMultiple()
    {
        $value = ['vbn', 'jkl'];
        $instance = $this->createInstance('i', '123');
        $this->assertEquals(array_map('escapeshellarg', $value), $instance->escapeShellArg($value), 'Must be an array of shell-arg-escaped strings');
    }
}
