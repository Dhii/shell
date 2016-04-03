<?php

namespace Dhii\Shell\Test;

use Dhii\Shell;

/**
 * Description of CommandAbstractTest.
 *
 * @author Dhii Team <development@dhii.co>
 */
class AbstractCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @since [*next-version*]
     *
     * @return Shell\CommandAbstract
     */
    public function createInstance()
    {
        $commandMock = $this->getMockForAbstractClass('\Dhii\Shell\AbstractCommand');

        return $commandMock;
    }

    /**
     * @see http://stackoverflow.com/a/4356295/565229
     * @since [*next-version*]
     *
     * @param int $length
     *
     * @return string The pseudo-random string.
     */
    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; ++$i) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /**
     * @since [*next-version*]
     */
    public function testCanGetSetWorkingDirectory()
    {
        $command = $this->createInstance();
        $value = $this->generateRandomString();
        $command->setWorkingDirectory($value);
        $this->assertEquals($value, $command->getWorkingDirectory(), 'Working directory must be settable and retrievable');
    }

    /**
     * @since [*next-version*]
     */
    public function testCanGetSetWorkingDirectoryDefault()
    {
        $command = $this->createInstance();
        $value = null;
        $command->setWorkingDirectory($value);
        $this->assertEquals($value, $command->getWorkingDirectory(), 'Working directory must be settable and retrievable');
    }

    /**
     * @since [*next-version*]
     */
    public function testCanGetWorkingDirectoryDefault()
    {
        $command = $this->createInstance();
        $this->assertEquals(null, $command->getWorkingDirectory(), 'Working directory must be null by default');
    }

    /**
     * @since [*next-version*]
     */
    public function testCanGetSetEnvVars()
    {
        $command = $this->createInstance();
        $value = [
            'ENV_VAR_1' => $this->generateRandomString(),
            'ENV_VAR_2' => $this->generateRandomString(),
        ];
        $command->setEnvironment($value);
        $this->assertEquals($value, $command->getEnvironment(), 'Environment vars must be settable and retrievable');
    }

    /**
     * @since [*next-version*]
     */
    public function testCanGetSetEnvVarsDefault()
    {
        $command = $this->createInstance();
        $value = null;
        $command->setEnvironment($value);
        $this->assertEquals($value, $command->getEnvironment(), 'Environment vars must be settable and retrievable');
    }

    /**
     * @since [*next-version*]
     */
    public function testCanGetEnvVarsDefault()
    {
        $command = $this->createInstance();
        $this->assertEquals(null, $command->getEnvironment(), 'Environment must be null by default');
    }

    public function testCanGetOptionsDefault()
    {
        $command = $this->createInstance();
        $this->assertEquals([], $command->getOptions(), 'Options must be an empty array by default');
    }

    /**
     * @since [*next-version*]
     */
    public function testCanGetSetOptions()
    {
        $command = $this->createInstance();
        $value = [
            'option_1' => $this->generateRandomString(),
            'option_2' => $this->generateRandomString(),
        ];
        $command->setOptions($value);
        $this->assertEquals($value, $command->getOptions(), 'Options must be settable and retrievable');
    }
}
