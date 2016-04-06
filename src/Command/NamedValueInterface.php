<?php

namespace Dhii\Shell\Command;

/**
 * Some value of a CLI command that has a name.
 *
 * This is normally an argument or a flag.
 *
 * @since [*next-version*]
 *
 * @author Dhii Team <development@dhii.co>
 */
interface NamedValueInterface extends ValueInterface
{
    /**
     * @since [*next-version*]
     *
     * @return array All the values represented by this instance.
     */
    public function getValues();

    /**
     * @since [*next-version*]
     *
     * @return string The name of the value represented by this instance.
     */
    public function getName();
}
