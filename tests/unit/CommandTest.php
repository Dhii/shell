<?php

namespace Dhii\Shell\Test;

/**
 * Description of CommandTest
 *
 * @since [*next-version*]
 * @author Dhii Team <development@dhii.co>
 */
class CommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @since [*next-version*]
     * @param string $mainCommand The main command text.
     * @return \Dhii\Shell\Command
     */
    public function createInstance($mainCommand = 'ls')
    {
        $command = new \Dhii\Shell\Command($mainCommand);
        return $command;
    }

    /**
     * Tests whether instances of the commandcan be created,
     * and implement all required standards.
     *
     * @since [*next-version*]
     */
    public function testCanBeInstantiated()
    {
        $command = $this->createInstance();
        $this->assertInstanceOf('\\Dhii\\ShellInterop\\CommandInterface', $command, 'Command must be an interoperable command');
        $this->assertInstanceOf('\\Dhii\\ShellCommandInterop\\ConfigurableCommandInterface', $command, 'Command must be a configurable command');
        $this->assertInstanceOf('\\Dhii\\ShellCommandInterop\\MutableCommandInterface', $command, 'Command must be a mutable command');
    }

    /**
     * Tests whether the main command can be set and retrieved.
     *
     * @since [*next-version*]
     */
    public function testCanRetrieveMainCommand()
    {
        $mainCommand = 'git';
        $command = $this->createInstance($mainCommand);
        $this->assertSame($mainCommand, $command->getMainCommand(), 'Main command must be retrievable');
    }

    /**
     * Tests whether the main command can be set and output correctly on its own.
     *
     * @since [*next-version*]
     */
    public function testCanOutputMainCommand()
    {
        $mainCommand = 'git';
        $command = $this->createInstance($mainCommand);
        $this->assertEquals($mainCommand, (string)$command, 'Main command must be output correctly alone');
    }

    /**
     * Tests whether a single sub command can be set, and retrieved in uniform way.
     *
     * @since [*next-version*]
     */
    public function testCanSetGetSubCommand()
    {
        $mainCommand = 'composer';
        $subCommand = 'init';
        $command = $this->createInstance($mainCommand);
        $command->addSubCommand($subCommand);
        $this->assertSame([$subCommand], $command->getSubCommands(), 'Must be able to have a list of all subcommands retrieved');
    }

    /**
     * Tests whether multiple sub commands can be set, and retrieved in uniform way.
     *
     * @since [*next-version*]
     */
    public function testCanSetGetSubCommands()
    {
        $mainCommand = 'composer';
        $subCommands = ['init', 'another'];
        $command = $this->createInstance($mainCommand);
        foreach($subCommands as $_subCommand) {
            $command->addSubCommand($_subCommand);
        }
        $this->assertSame($subCommands, $command->getSubCommands(), 'Must be able to have a list of all subcommands retrieved');
    }

    /**
     * Tests whether the subcommand text can be output correctly in the command's final text.
     *
     * @since [*next-version*]
     */
    public function testCanOutputSubCommand()
    {
        $mainCommand = 'composer';
        $subCommand = 'init';
        $command = $this->createInstance($mainCommand);
        $command->addSubCommand($subCommand);
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, $subCommand), (string) $command, 'Must be able to output the command and subcommand string correctly');
    }

    /**
     * Tests whether the subcommand text can be output correctly in the command's final text
     * even if there are multiple sub commands.
     *
     * @since [*next-version*]
     */
    public function testCanOutputSubCommands()
    {
        $mainCommand = 'composer';
        $subCommands = ['init', 'another'];
        $command = $this->createInstance($mainCommand);
        foreach($subCommands as $_subCommand) {
            $command->addSubCommand($_subCommand);
        }
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, implode(' ', $subCommands)), (string) $command, 'Must be able to output the command and subcommand string correctly');
    }

    /**
     * Tests whether a single parameter can be set, and retrieved in a uniform way.
     *
     * @since [*next-version*]
     */
    public function testCanSetGetParameter()
    {
        $mainCommand = 'ls';
        $parameter = '/var/log';
        $command = $this->createInstance($mainCommand);
        $command->addParameter($parameter);
        $this->assertEquals([$parameter], $command->getParameters(), 'Must be able to get and set a single parameter');
    }

    /**
     * Tests whether multiple parameters can be set, and retrieved in a uniform way.
     *
     * @since [*next-version*]
     */
    public function testCanSetGetParameters()
    {
        $mainCommand = 'ls';
        $parameters = ['/var/log', './'];
        $command = $this->createInstance($mainCommand);
        foreach ($parameters as $_parameter) {
            $command->addParameter($_parameter);
        }
        $this->assertEquals($parameters, $command->getParameters(), 'Must be able to get and set multiple parameters');
    }

    /**
     * Tests whether the single parameters text can be output correctly in the command's final text.
     *
     * @since [*next-version*]
     */
    public function testCanOutputParameter()
    {
        $mainCommand = 'ls';
        $parameter = '/var/log';
        $command = $this->createInstance($mainCommand);
        $command->addParameter($parameter);
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, $parameter), (string) $command, 'Must be able to output the command and parameter string correctly');
    }

    /**
     * Tests whether the multiple parameters text can be output correctly in the command's final text.
     *
     * @since [*next-version*]
     */
    public function testCanOutputParameters()
    {
        $mainCommand = 'ls';
        $parameters = ['/var/log', './'];
        $command = $this->createInstance($mainCommand);
        foreach ($parameters as $_parameter) {
            $command->addParameter($_parameter);
        }
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, implode(' ', $parameters)), (string) $command, 'Must be able to output the command and parameters string correctly');
    }

    /**
     * Tests whether a single argument can be set, and retrieved in a uniform way.
     *
     * @since [*next-version*]
     */
    public function testCanSetGetArgument()
    {
        $argument = '--human-readable';
        $command = $this->createInstance();
        $command->addArgument($argument);
        $this->assertSame([$argument], $command->getArguments(), 'Must be able to get and set a sinlge argument');
    }

    /**
     * Tests whether multiple arguments can be set, and retrieved in a uniform way.
     *
     * @since [*next-version*]
     */
    public function testCanSetGetArguments()
    {
        $arguments = ['/var/log', './'];
        $command = $this->createInstance();
        foreach ($arguments as $_argument) {
            $command->addArgument($_argument);
        }
        $this->assertSame($arguments, $command->getArguments(), 'Must be able to get and set multiple arguments');
    }

    /**
     * Tests whether the single argument text can be output correctly in the command's final text.
     *
     * @since [*next-version*]
     */
    public function testCanOutputArgument()
    {
        $mainCommand = 'ls';
        $argument = '--human-readable';
        $command = $this->createInstance($mainCommand);
        $command->addArgument($argument);
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, $argument), (string) $command, 'Must be able to output the command and argument string correctly');
    }

    /**
     * Tests whether the single argument text can be output correctly in the command's final text,
     * even if the argument has a value.
     *
     * @since [*next-version*]
     */
    public function testCanOutputArgumentWithValue()
    {
        $mainCommand = 'ls';
        $argument = '--human-readable yes';
        $command = $this->createInstance($mainCommand);
        $command->addArgument($argument);
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, $argument), (string) $command, 'Must be able to output the command and argument string correctly');
    }

    /**
     * Tests whether the multiple arguments text can be output correctly in the command's final text.
     *
     * @since [*next-version*]
     */
    public function testCanOutputArguments()
    {
        $mainCommand = 'ls';
        $arguments = ['--human-readable', '--all'];
        $command = $this->createInstance($mainCommand);
        foreach ($arguments as $_argument) {
            $command->addArgument($_argument);
        }
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, implode(' ', $arguments)), (string) $command, 'Must be able to output the command and argument string correctly');
    }

    /**
     * Tests whether the multiple arguments text can be output correctly in the command's final text,
     * even if the arguments have values.
     *
     * @since [*next-version*]
     */
    public function testCanOutputArgumentsWithValues()
    {
        $mainCommand = 'ls';
        $arguments = ['--human-readable yes', '--all ofcourse'];
        $command = $this->createInstance($mainCommand);
        foreach ($arguments as $_argument) {
            $command->addArgument($_argument);
        }
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, implode(' ', $arguments)), (string) $command, 'Must be able to output the command and argument string correctly');
    }

    /**
     * Tests whether a single flag can be set, and retrieved in a uniform way.
     *
     * @since [*next-version*]
     */
    public function testCanSetGetFlag()
    {
        $flag = '-h';
        $command = $this->createInstance();
        $command->addFlag($flag);
        $this->assertSame([$flag], $command->getFlags(), 'Must be able to get and set a sinlge flag');
    }

    /**
     * Tests whether multiple flags can be set, and retrieved in a uniform way.
     *
     * @since [*next-version*]
     */
    public function testCanSetGetFlags()
    {
        $flags = ['-h', '-a'];
        $command = $this->createInstance();
        foreach ($flags as $_flag) {
            $command->addFlag($_flag);
        }
        $this->assertSame($flags, $command->getFlags(), 'Must be able to get and set multiple flags');
    }

    /**
     * Tests whether the single flag text can be output correctly in the command's final text.
     *
     * @since [*next-version*]
     */
    public function testCanOutputFlag()
    {
        $mainCommand = 'ls';
        $flag = '-h';
        $command = $this->createInstance($mainCommand);
        $command->addFlag($flag);
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, $flag), (string) $command, 'Must be able to output the command and flag string correctly');
    }

    /**
     * Tests whether the single flag text can be output correctly in the command's final text,
     * even if the flag has a value.
     *
     * @since [*next-version*]
     */
    public function testCanOutputFlagWithValue()
    {
        $mainCommand = 'tar';
        $flag = '-f ./my_file';
        $command = $this->createInstance($mainCommand);
        $command->addFlag($flag);
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, $flag), (string) $command, 'Must be able to output the command and flag string correctly');
    }

    /**
     * Tests whether the multiple flags text can be output correctly in the command's final text.
     *
     * @since [*next-version*]
     */
    public function testCanOutputFlags()
    {
        $mainCommand = 'ls';
        $flags = ['-h', '-a'];
        $command = $this->createInstance($mainCommand);
        foreach ($flags as $_flag) {
            $command->addFlag($_flag);
        }
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, implode(' ', $flags)), (string) $command, 'Must be able to output the command and flags string correctly');
    }

    /**
     * Tests whether the multiple flags text can be output correctly in the command's final text,
     * even if flags have values.
     *
     * @since [*next-version*]
     */
    public function testCanOutputFlagsWithValues()
    {
        $mainCommand = 'ls';
        $flags = ['-h 123', '-a 456'];
        $command = $this->createInstance($mainCommand);
        foreach ($flags as $_flag) {
            $command->addFlag($_flag);
        }
        $this->assertEquals(sprintf('%1$s %2$s', $mainCommand, implode(' ', $flags)), (string) $command, 'Must be able to output the command and flags string correctly');
    }

    /**
     * Tests whether all the possible parts of the command can be output together,
     * and in the correct order, with correct spacing.
     *
     * @since [*next-version*]
     */
    public function testCanOutputAll()
    {
        $mainCommand = 'git';
        $command = $this->createInstance($mainCommand);

        $subCommands = ['clone'];
        foreach($subCommands as $_subCommand) {
            $command->addSubCommand($_subCommand);
        }

        $flags = ['-f'];
        foreach ($flags as $_flag) {
            $command->addFlag($_flag);
        }

        $arguments = ['--mirror'];
        foreach ($arguments as $_argument) {
            $command->addArgument($_argument);
        }

        $parameters = ['https://github.com/Dhii/shell-interop.git', '.'];
        foreach ($parameters as $_parameter) {
            $command->addParameter($_parameter);
        }

        $this->assertEquals(
            sprintf('%1$s %2$s %3$s %4$s %5$s', $mainCommand, implode(' ', $subCommands), implode(' ', $flags), implode(' ', $arguments), implode(' ', $parameters)),
            (string) $command,
            'Must be able to output the command string correctly, including the sub command, flags, arguments, and parameters'
        );
    }

    /**
     * Tests whether all the possible parts of the command can be output together,
     * and in the correct order, with correct spacing. Arguments and flags have values.
     *
     * @since [*next-version*]
     */
    public function testCanOutputAllWithValues()
    {
        $mainCommand = 'ls';
        $command = $this->createInstance($mainCommand);

        $subCommands = ['init', 'another'];
        foreach($subCommands as $_subCommand) {
            $command->addSubCommand($_subCommand);
        }

        $flags = ['-h 123', '-a 456'];
        foreach ($flags as $_flag) {
            $command->addFlag($_flag);
        }

        $arguments = ['--human-readable yes', '--all ofcourse'];
        foreach ($arguments as $_argument) {
            $command->addArgument($_argument);
        }

        $parameters = ['/var/log', './'];
        foreach ($parameters as $_parameter) {
            $command->addParameter($_parameter);
        }

        $this->assertEquals(
            sprintf('%1$s %2$s %3$s %4$s %5$s', $mainCommand, implode(' ', $subCommands), implode(' ', $flags), implode(' ', $arguments), implode(' ', $parameters)),
            (string) $command,
            'Must be able to output the command string correctly, including the sub command, flags, arguments, and parameters'
        );
    }
}
