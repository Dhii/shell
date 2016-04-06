<?php

namespace Dhii\Shell\Command;

/**
 * Something that can be a command line value.
 *
 * @since [*next-version*]
 * 
 * @author Dhii Team <development@dhii.co>
 */
interface ValueInterface
{
    /**
     * @since [*next-version*]
     *
     * @return The string representation of the named value.
     */
    public function __toString();

    /**
     * @since [*next-version*]
     *
     * @return string The string representation of only the value.
     */
    public function getValue();
}
