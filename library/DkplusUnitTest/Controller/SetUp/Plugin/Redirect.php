<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp\Plugin
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp\Plugin;

/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp\Plugin
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
class Redirect extends AbstractPlugin
{
    /** @return \PHPUnit_Framework_MockObject_MockObject */
    public function createMock()
    {
        return $this->testCase->getMock('Zend\Mvc\Controller\Plugin\Redirect');
    }

    /** @return string */
    public function getName()
    {
        return 'redirect';
    }
}

