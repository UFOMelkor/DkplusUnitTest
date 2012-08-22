<?php
/**
 * $Id$
 *
 * PHP Version 5.3
 *
 * @category   Dkplus
 * @package    Test
 * @subpackage Controller
 * @author     Oskar Bley <oskar@steppenhahn.de>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/ CC BY-SA 3.0
 * @version    SVN: $Revision$
 * @link       http://lib.dkplus.org/
 */

namespace Dkplus\Test\Controller\Setup;

use PHPUnit_Framework_TestCase as PhpUnitTestCase;
use Zend\Mvc\InjectApplicationEventInterface;
use Zend\Mvc\Router\RouteMatch;

/**
 * Preparing a controller to be testet with mvc-data.
 *
 * @category   Dkplus
 * @package    Test
 * @subpackage Controller
 * @author     Oskar Bley <oskar@steppenhahn.de>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/ CC BY-SA 3.0
 * @version    Release: $Revision$
 * @link       http://lib.dkplus.org/
 */
class MvcEvent implements MvcEventInterface
{
    /** @var TestCase */
    private $testCase;

    /** @var RouteMatch|\PHPUnit_Framework_MockObject_MockObject */
    protected $routeMatch;

    /** @var \Zend\Mvc\MvcEvent\PHPUnit_Framework_MockObject_MockObject */
    protected $event;

    /** @param PhpUnitTestCase $testCase */
    public function __construct(PhpUnitTestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function applyToController(InjectApplicationEventInterface $controller)
    {
        $this->routeMatch = $this->createRouteMatch();
        $this->event      = $this->createMvcEvent($this->routeMatch);

        $controller->setEvent($this->event);
    }

    /** @return \Zend\Mvc\MvcEvent|\PHPUnit_Framework_MockObject_MockObject */
    public function getMvcEvent()
    {
        return $this->event;
    }

    private function createMvcEvent(RouteMatch $routeMatch)
    {
        $event = $this->testCase->getMock('Zend\Mvc\MvcEvent');
        $event->expects($this->testCase->any())
              ->method('getRouteMatch')
              ->will($this->testCase->returnValue($routeMatch));
        $event->expects($this->testCase->any())
              ->method('setRequest')
              ->will($this->testCase->returnSelf());
        $event->expects($this->testCase->any())
              ->method('setResponse')
              ->will($this->testCase->returnSelf());
        return $event;
    }

    /** @return RouteMatch|\PHPUnit_Framework_MockObject_MockObject */
    public function getRouteMatch()
    {
        return $this->routeMatch;
    }

    private function createRouteMatch()
    {
        $routeMatch = $this->testCase->getMockBuilder('Zend\Mvc\Router\RouteMatch')
                                     ->disableOriginalConstructor()
                                     ->getMock();
        $routeMatch->expects($this->testCase->any())
                   ->method('getParams')
                   ->will($this->testCase->returnValue(array()));
        return $routeMatch;
    }

    public function setMatchedRouteName($name)
    {
        $this->getRouteMatch()->expects($this->testCase->any())
                              ->method('getMatchedRouteName')
                              ->will($this->testCase->returnValue($name));
    }

    public function setRouteMatchParams(array $params)
    {
        $this->getRouteMatch()->expects($this->testCase->any())
                              ->method('getParams')
                              ->will($this->testCase->returnValue($params));
        $this->getRouteMatch()->expects($this->testCase->any())
                              ->method('getParam')
                              ->will($this->testCase->returnCallback(
                                  function ($key, $default = null) use ($params) {
                                    if (\array_key_exists($key, $params)) {
                                        return $params[$key];
                                    }
                                    return $default;
                                  }
                              ));
    }

}