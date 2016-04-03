<?php

namespace Dhii\Shell;

use Dhii\ShellInterop;
use Dhii\ShellCommandInterop;

/**
 * Common functionality for shell commands.
 *
 * @author Dhii Team <development@dhii.co>
 */
abstract class AbstractCommand implements
    ShellInterop\CommandInterface,
    ShellCommandInterop\ConfigurableCommandInterface
{
    protected $workingDirectory;
    protected $environment;
    protected $options = array();

    ## Implementation of CommandInterface ######################################

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getWorkingDirectory()
    {
        return $this->workingDirectory;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getOptions()
    {
        return $this->options;
    }

    ## Implementation of ConfigurableCommandInterface ##########################


    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function setWorkingDirectory($directoryPath)
    {
        $this->workingDirectory = (string) $directoryPath;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function setEnvironment($environmentVars)
    {
        if (!is_array($environmentVars) && !is_null($environmentVars)) {
            throw new \InvalidArgumentException('Could not set environment vars: argument must be an array or null');
        }

        $this->environment = $environmentVars;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function setOptions($optionVars)
    {
        if (!is_array($optionVars)) {
            throw new \InvalidArgumentException('Could not set option vars: argument must be an array');
        }

        $this->options = $optionVars;

        return $this;
    }
}
