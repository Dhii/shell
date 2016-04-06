<?php

namespace Dhii\Shell\Command;

/**
 * Description of AbstractValue.
 *
 * @since [*next-version*]
 *
 * @author Dhii Team <development@dhii.co>
 */
abstract class AbstractValue implements ValueInterface
{
    protected $value;

    /**
     * @since [*next-version*]
     * 
     * @param int|string $value
     */
    public function __construct($value)
    {
        $this->_setValue($value);
    }

    public function __toString()
    {
        return $this->getValues();
    }

    /**
     * @since [*next-version*]
     *
     * @param string|int|array|null $value The value, or arrray of values to set.
     *
     * @return \Dhii\Shell\Command\AbstractValue
     */
    protected function _setValue($value)
    {
        if (!is_null($value)) {
            $value = (array) $value;
        }

        $this->value = $value;

        return $this;
    }

    /**
     * Retrieve the raw value represented by this instance.
     *
     * @since [*next-version*]
     *
     * @return type
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get all the values represented by this instance as string.
     *
     * @since [*next-version*]
     *
     * @return string The string representation of this named value.
     */
    public function getValues()
    {
        return implode(' ', $this->getValue());
    }

    /**
     * Escapes one or many shell arguments.
     *
     * @since [*next-version*]
     *
     * @param string|int|array $argument A shell argument or array of such arguments.
     *
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
