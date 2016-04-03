<?php

namespace Dhii\Shell;

/**
 * Someting that exposes its command configuration interface.
 * Intended to provide a reusable implementation of \Dhii\ShellInterop\CommandInterface.
 *
 * @author Dhii Team <development@dhii.co>
 */
trait CanReadCommandConfigurationTrait
{
    protected $workingDirectory;
    protected $environment;
    protected $options = [];

    /**
     * @since [*next-version*]
     */
    public function getWorkingDirectory()
    {
        return $this->workingDirectory;
    }

    /**
     * @since [*next-version*]
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @since [*next-version*]
     */
    public function getOptions()
    {
        return $this->options;
    }
}
