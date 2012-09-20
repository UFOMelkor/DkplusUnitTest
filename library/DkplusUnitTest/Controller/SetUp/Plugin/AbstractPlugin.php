<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp\Plugin
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp\Plugin;

use PHPUnit_Framework_TestCase as PhpUnitTestCase;

/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp\Plugin
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
abstract class AbstractPlugin
{
    /** @var PhpUnitTestCase */
    protected $testCase;

    public function __construct(PhpUnitTestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    /** @return \PHPUnit_Framework_MockObject_MockObject */
    abstract public function createMock();

    /** @return string */
    abstract public function getName();
}

