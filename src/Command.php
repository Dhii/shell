<?php

namespace Dhii\Shell;

use Dhii\ShellCommandInterop;

/**
 * A CLI command.
 *
 * @since [*next-version*]
 *
 * @author Dhii Team <development@dhii.co>
 */
class Command extends AbstractCommand implements ShellCommandInterop\MutableCommandInterface
{
    use CanWriteMutableCommandTrait;
    use CanReadMutableCommandTrait;

    protected $mainCommand;
    protected $subCommands = [];
    protected $parameters = [];
    protected $arguments = [];
    protected $flags = [];

    public function __construct($mainCommand)
    {
        $this->_setMainCommand($mainCommand);
    }

    public function __toString()
    {
        return implode('', array(
            $this->getMainCommand(),
            $this->padValue($this->joinValues($this->subCommands)),
            $this->padValue($this->joinValues($this->flags)),
            $this->padValue($this->joinValues($this->arguments)),
            $this->padValue($this->joinValues($this->parameters)),
        ));
    }

    protected function _setMainCommand($mainCommand)
    {
        $this->mainCommand = $mainCommand;
        return $this;
    }

    public function getMainCommand()
    {
        return $this->mainCommand;
    }
}
