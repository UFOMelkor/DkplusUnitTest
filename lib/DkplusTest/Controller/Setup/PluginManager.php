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

use Zend\Mvc\Controller\AbstractController as Controller;
use \PHPUnit_Framework_TestCase as PhpUnitTestCase;

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
class PluginManager implements PluginManagerInterface
{
    /** @avar \Zend\Mvc\Controller\PluginManager|\PHPUnit_Framework_MockObject_MockObject */

    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $pluginManager;

    /** @var PhpUnitTestCase */
    private $testCase;

    /** @var array */
    private $pluginMap;

    public function __construct(PhpUnitTestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function applyToController(Controller $controller)
    {
        $that                = $this;
        $this->pluginMap     = array();
        $this->pluginManager = $this->createPluginManager();
        $this->pluginManager->expects($this->testCase->any())
                            ->method('get')
                            ->will($this->testCase->returnCallback(
                                function($name) use ($that) {
                                    $pluginMap = $that->getPluginMap();
                                    return isset($pluginMap[$name])
                                           ? $pluginMap[$name]
                                           : null;
                                }
                            ));
        $controller->setPluginManager($this->pluginManager);
    }

    private function createPluginManager()
    {
        return $this->testCase->getMock('Zend\Mvc\Controller\PluginManager');
    }

    public function registerPlugin($name, $plugin)
    {
        $this->pluginMap[$name] = $plugin;
    }

    public function getPluginMap()
    {
        return $this->pluginMap;
    }
}

