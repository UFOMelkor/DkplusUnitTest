<?php
/**
 * @category DkplusUnitTest
 * @package  Repository
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Repository;

use DkplusUnitTest\TestCase as BaseTestCase;

/**
 * Extension of phpunit-testcase with some utily functions for doctrine-testing.
 *
 * @category DkplusUnitTest
 * @package  Repository
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusUnitTest
 */
class TestCase extends BaseTestCase
{
    /**
     * Creates an mock object that extends AbstractQuery and provides the same
     * methods as the doctrine query.
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getDoctrineQueryMock()
    {
        return $this->getMockBuilder('Doctrine\ORM\AbstractQuery')
                    ->disableOriginalConstructor()
                    ->getMock();
    }
}

