<?php

namespace Dhii\Shell\Command;

/**
 * Description of Parameter.
 *
 * @since [*next-version*]
 * 
 * @author Dhii Team <development@dhii.co>
 */
class Parameter extends AbstractValue implements ParameterInterface
{
    /**
     * {@inheritdoc}
     * 
     * @since [*next-version*]
     */
    public function getValues()
    {
        return implode(' ', array_map(array($this, 'escapeShellArg'), $this->getValue()));
    }
}
