<?php

namespace Dhii\Shell;

/**
 * Description of CanWriteCommandConfigurationTrait.
 *
 * @author Dhii Team <development@dhii.co>
 */
trait CanWriteCommandConfigurationTrait
{
    protected $workingDirectory;
    protected $environment;
    protected $options = [];

    /**
     * @since [*next-version*]
     */
    public function setWorkingDirectory($directoryPath)
    {
        $this->workingDirectory = (string) $directoryPath;

        return $this;
    }

    /**
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
