<?php

namespace Dhii\Shell\Command;

/**
 * Common functionality for named values.
 *
 * @since [*next-version*]
 * @author Dhii Team <development@dhii.co>
 */
abstract class NamedValueAbstract implements NamedValueInterface
{
    const PREFIX = '';

    protected $name;
    protected $value;

    /**
     * @since [*next-version*]
     * @param string $name Name of the value to set.
     * @param string|int|null|array $value A value or array of values to set.
     */
    public function __construct($name, $value = null)
    {
        $this->_setName($name);
        $this->_setValue($value);
    }

    /**
     * Get a string representation of this value.
     *
     * If no values, only the prefixed name is returned.
     * Otherwise, each value will have the prefixed name before it.
     *
     * @since [*next-version*]
     * @return string The full string value of this named value, complete with name and string.
     *  The prefixed name will appear before each value.
     */
    public function __toString()
    {
        $value = $this->getValue();
        return is_null($value)
            ? $this->getPrefixedName()
            : $this->getValues();
    }

    public function getPrefix($string = '')
    {
        return sprintf('%1$s%2$s', static::PREFIX, $string);
    }

    /**
     * @since [*next-version*]
     * @param string $name The name of the value.
     * @return NamedValueAbstract This instance.
     */
    protected function _setName($name)
    {
        $this->name = (string)$name;
        return $this;
    }

    /**
     * Get the name of this value only.
     *
     * @since [*next-version*]
     * @return string The name of the value.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the prefixed name of this named value.
     *
     * @since [*next-version*]
     * @return string The name, but with prefix before it.
     */
    public function getPrefixedName()
    {
        return sprintf('%1$s%2$s', $this->getPrefix(), $this->name);
    }

    /**
     * @since [*next-version*]
     * @param string|int|array|null $value The value, or arrray of values to set.
     */
    protected function _setValue($value)
    {
        if (!is_null($value)) {
            $value = (array) $value;
        }

        $this->value = $value;
    }

    /**
     * Get all the values, raw.
     *
     * @since [*next-version*]
     * @return string|int|array|null The raw value/values.
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get all the values as string.
     *
     * Will contain the prefixed name before each value.
     *
     * @since [*next-version*]
     * @return string The string representation of this named value.
     */
    public function getValues()
    {
        $name = sprintf('%1$s ', $this->getPrefixedName());
        return sprintf('%1$s%2$s', $name, join(" $name", $this->escapeShellArg($this->getValue())));
    }

    /**
     * Escapes one or many shell arguments.
     *
     * @since [*next-version*]
     * @param string|int|array $argument A shell argument or array of such arguments.
     * @return type
     */
    public function escapeShellArg($argument)
    {
        if (is_array($argument)) {
            return array_map('escapeshellarg', $argument);
        }

        return escapeshellarg($argument);
    }
}
