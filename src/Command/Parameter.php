<?php

namespace Dhii\Shell\Command;

/**
 * Description of Parameter.
 *
 * @author Dhii Team <development@dhii.co>
 */
class Parameter extends AbstractValue implements ParameterInterface
{
    public function getValues()
    {
        return implode(' ', array_map(array($this, 'escapeShellArg'), $this->getValue()));
    }
}
