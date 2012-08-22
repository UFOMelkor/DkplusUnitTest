<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp;

/**
 * Setting up a mvc event mock for the controller.
 *
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
interface MvcEventInterface extends SetUpInterface
{
    public function setUpController($controller);

    public function setRouteMatchParams(array $params);

    /** @param string $name */
    public function setMatchedRouteName($name);

    /** @return Zend\Mvc\Router\RouteMatch|\PHPUnit_Framework_MockObject_MockObject */
    public function getRouteMatch();

    /** @return Zend\Mvc\MvcEvent|\PHPUnit_Framework_MockObject_MockObject */
    public function getMvcEvent();
}

