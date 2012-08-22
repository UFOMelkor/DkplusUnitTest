<?php
/**
 * @category DkplusTest
 * @package  TestCase
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusTest
 */

namespace DkplusTest\Controller\Setup;

use Zend\Mvc\InjectApplicationEventInterface;

/**
 * Preparing a controller to be testet with mvc-data.
 *
 * @category DkplusTest
 * @package  TestCase
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusTest
 */
interface MvcEventInterface extends SetupInterface
{
    public function applyToController(InjectApplicationEventInterface $controller);

    public function setRouteMatchParams(array $params);

    /** @param string $name */
    public function setMatchedRouteName($name);

    /** @return Zend\Mvc\Router\RouteMatch|\PHPUnit_Framework_MockObject_MockObject */
    public function getRouteMatch();

    /** @return Zend\Mvc\MvcEvent|\PHPUnit_Framework_MockObject_MockObject */
    public function getMvcEvent();
}

