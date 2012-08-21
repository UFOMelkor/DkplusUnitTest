<?php
/**
 * @category DkplusTest
 * @package  TestCase
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusTest
 */

namespace DkplusTest;

use PHPUnit_Framework_TestCase as PhpUnitTestCase;

/**
 * Extension of phpunit-testcase with some utily functions.
 *
 * @category DkplusTest
 * @package  TestCase
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusTest
 */
class TestCase extends PhpUnitTestCase
{
    /**
     * Creates an mock object that does not use the original constructor.
     *
     * @param  string $className
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockIgnoringConstructor($className)
    {
        return $this->getMockBuilder($className)
                    ->disableOriginalConstructor()
                    ->getMock();
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
