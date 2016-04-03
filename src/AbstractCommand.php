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
    use CanReadCommandConfigurationTrait;
    use CanWriteCommandConfigurationTrait;

    /**
     * @since [*next-version*]
     */
    public function joinValues($values, $glue = ' ')
    {
        if (is_null($values)) {
            return $values;
        }

        $values = (array) $values;
        $values = array_map(function ($value) {
            return (string) $value;
        }, $values);

        return trim(implode($glue, $values));
    }

    public function padValue($value, $padding = ' ')
    {
        if (!is_null($value) && $value !== '') {
            $value = sprintf('%1$s%2$s', $padding, $value);
        }

        return $value;
    }
}
