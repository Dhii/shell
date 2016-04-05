<?php

namespace Dhii\Shell;

use Dhii\Shell\Command\NamedValueInterface;

/**
 * Something that can behave like a mutable command, and write its command properties.
 *
 * @since [*next-version*]
 *
 * @author Dhii Team <development@dhii.co>
 */
trait CanWriteMutableCommandTrait
{
    // PHP < 7.0 doesn't like this in strict mode
//    protected $subCommands = [];
//    protected $parameters = [];
//    protected $arguments = [];
//    protected $flags = [];

    /**
     * Adds a sub command.
     *
     * @since [*next-version*]
     *
     * @param string|NamedValueInterface $subCommand
     */
    public function addSubCommand($subCommand)
    {
        $this->subCommands[] = $subCommand;

        return $this;
    }

    /**
     * Adds a command argument.
     *
     * @since [*next-version*]
     *
     * @param string|NamedValueInterface $argument
     */
    public function addArgument($argument)
    {
        $this->arguments[] = $argument;

        return $this;
    }

    /**
     * Adds a command parameter.
     *
     * @since [*next-version*]
     *
     * @param string|NamedValueInterface $parameter
     */
    public function addParameter($parameter)
    {
        $this->parameters[] = $parameter;

        return $this;
    }

    /**
     * Adds a command flag.
     *
     * @since [*next-version*]
     *
     * @param string|NamedValueInterface $flag
     */
    public function addFlag($flag)
    {
        $this->flags[] = $flag;

        return $this;
    }
}
