<?php
/**
 * @category DkplusUnitTest
 * @package  TestCase
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest;

use PHPUnit_Framework_TestCase as PhpUnitTestCase;

/**
 * Extension of phpunit-testcase with some utily functions.
 *
 * @category DkplusUnitTest
 * @package  TestCase
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusUnitTest
 */
class TestCase extends PhpUnitTestCase
{
    /**
     * Creates an mock object that does not use the original constructor.
     *
     * @param  string  $originalClassName
     * @param  array   $methods
     * @param  array   $arguments
     * @param  string  $mockClassName
     * @param  boolean $callOriginalClone
     * @param  boolean $callAutoload
     * @param  boolean $cloneArguments
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockIgnoringConstructor(
        $originalClassName,
        $methods = array(),
        array $arguments = array(),
        $mockClassName = '',
        $callOriginalClone = true,
        $callAutoload = true,
        $cloneArguments = false
    ) {
        return $this->getMock(
            $originalClassName,
            $methods,
            $arguments,
            $mockClassName,
            false,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments
        );
    }

    /**
     * Sets a property of an object that is private or protected.
     *
     * @param object $object
     * @param string $property
     * @param mixed $value
     */
    protected function setProperty($object, $property, $value)
    {
        $reflector = new \ReflectionProperty(get_class($object), $property);
        $reflector->setAccessible(true);
        $reflector->setValue($object, $value);
    }
}

