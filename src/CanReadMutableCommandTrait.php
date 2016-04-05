<?php

namespace Dhii\Shell;

/**
 * Something that can behave like a mutable command, and read its command properties.
 *
 * @since [*next-version*]
 *
 * @author Dhii Team <development@dhii.co>
 */
trait CanReadMutableCommandTrait
{
    // PHP < 7.0 doesn't like this in strict mode
//    protected $subCommands = [];
//    protected $parameters = [];
//    protected $arguments = [];
//    protected $flags = [];

    /**
     * Gets the sub commands.
     *
     * @since [*next-version*]
     *
     * @return array All subcommands of this command.
     */
    public function getSubCommands()
    {
        return $this->subCommands;
    }

    /**
     * Gets the arguments.
     *
     * @since [*next-version*]
     *
     * @return array All arguments of this command.
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Gets the parameters.
     *
     * @since [*next-version*]
     *
     * @return array All parameters of this command.
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Gets the flags.
     *
     * @since [*next-version*]
     *
     * @return array All flags of this command.
     */
    public function getFlags()
    {
        return $this->flags;
    }
}
