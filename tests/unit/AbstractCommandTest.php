<?php

namespace Dhii\Shell\Test;

use Dhii\Shell;

/**
 * Description of CommandAbstractTest.
 *
 * @since [*next-version*]
 * @author Dhii Team <development@dhii.co>
 */
class AbstractCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @since [*next-version*]
     *
     * @return Shell\AbstractCommand
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

    /**
     * Tests if a single value is joined correctly.
     *
     * @since [*next-version*]
     */
    public function testCanJoinValuesSingle()
    {
        $command = $this->createInstance();
        $value = 123;
        $this->assertSame((string) $value, $command->joinValues($value, ' '), 'Joined value must be same as input, but of string type');
    }

    /**
     * Tests if multiple values are joined correctly.
     *
     * @since [*next-version*]
     */
    public function testCanJoinValuesMultiple()
    {
        $command = $this->createInstance();
        $value = [234, 345];
        $this->assertSame(sprintf('%1$s %2$s', $value[0], $value[1]), $command->joinValues($value, ' '), 'Joined values must be a string concatenated with a space');
    }

    /**
     * Tests if multiple values are joined correctly using the default separator.
     *
     * @since [*next-version*]
     */
    public function testCanJoinValuesDefaultGlue()
    {
        $command = $this->createInstance();
        $value = [321, 436];
        $this->assertSame(sprintf('%1$s %2$s', $value[0], $value[1]), $command->joinValues($value), 'Joined values must be a string concatenated with a space');
    }

    /**
     * Tests if a single empty value joined will remain empty.
     *
     * @since [*next-version*]
     */
    public function testCanJoinValuesEmptySingle()
    {
        $command = $this->createInstance();
        $value = '';
        $this->assertEquals($value, $command->joinValues($value, ' '), 'Joined value must be empty if empty');
    }

    /**
     * Tests if an empty array value joined will remain empty.
     *
     * @since [*next-version*]
     */
    public function testCanJoinValuesEmptyArray()
    {
        $command = $this->createInstance();
        $value = [];
        $this->assertEquals('', $command->joinValues($value, ' '), 'Joined value must be empty if empty array');
    }

    /**
     * Tests if an empty array value joined will remain empty.
     *
     * @since [*next-version*]
     */
    public function testCanJoinValuesEmptyMultiple()
    {
        $command = $this->createInstance();
        $value = ['', ''];
        $this->assertEquals('', $command->joinValues($value, ' '), 'Joined value must be empty if array of empty values');
    }

    /**
     * Tests if padded value will have been padded with explicit padding.
     *
     * @since [*next-version*]
     */
    public function testCanPadValue()
    {
        $command = $this->createInstance();
        $value = 'asd';
        $this->assertEquals(" $value", $command->padValue($value, ' '), 'Padded value must be same, but with a space in the beginning');
    }

    /**
     * Tests if padded value will have been padded with implicit padding just the same.
     *
     * @since [*next-version*]
     */
    public function testCanPadValueDefaultGlue()
    {
        $command = $this->createInstance();
        $value = 'gasdf';
        $this->assertEquals(" $value", $command->padValue($value), 'Padded value must be same, but with a space in the beginning');
    }

    /**
     * Tests if padded value will have been padded with explicit padding even
     * if it is not a string.
     *
     * @since [*next-version*]
     */
    public function testCanPadValueNonString()
    {
        $command = $this->createInstance();
        $value = 12351;
        $this->assertEquals(" $value", $command->padValue($value, ' '), 'Padded value must be same, but converted to string, and with a space in the beginning');
    }

    /**
     * Tests if padded value will not have been padded when null.
     *
     * @since [*next-version*]
     */
    public function testCanPadValueNull()
    {
        $command = $this->createInstance();
        $value = null;
        $this->assertEquals(null, $command->padValue($value, ' '), 'Null value must not be padded');
    }

    /**
     * Tests if padded value will not be padded if it's an empty string.
     *
     * @since [*next-version*]
     */
    public function testCanPadValueEmpty()
    {
        $command = $this->createInstance();
        $value = '';
        $this->assertEquals('', $command->padValue($value, ' '), 'Padded value must be empty if an empty value is being padded');
    }
}
