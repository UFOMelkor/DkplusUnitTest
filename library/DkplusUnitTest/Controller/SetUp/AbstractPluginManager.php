<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp;

use Zend\Mvc\Controller\AbstractController as Controller;
use \PHPUnit_Framework_TestCase as PhpUnitTestCase;

/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
abstract class AbstractPluginManager implements PluginManagerInterface
{
    /** @var \PHPUnit_Framework_MockObject_MockObject */
    private $pluginManager;

    /** @var PhpUnitTestCase */
    protected $testCase;

    /** @var array */
    protected $pluginMap;

    public function __construct(PhpUnitTestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function setUpController(Controller $controller)
    {
        $that                = $this;
        $this->pluginMap     = array();
        $this->pluginManager = $this->createPluginManager();
        $this->pluginManager->expects($this->testCase->any())
                            ->method('get')
                            ->will(
                                $this->testCase->returnCallback(
                                    function($name) use ($that) {
                                        $pluginMap = $that->getPluginMap();
                                        return isset($pluginMap[$name])
                                               ? $pluginMap[$name]
                                               : null;
                                    }
                                )
                            );
        $controller->setPluginManager($this->pluginManager);
    }

    private function createPluginManager()
    {
        return $this->testCase->getMock('Zend\Mvc\Controller\PluginManager');
    }

    public function getPluginMap()
    {
        return $this->pluginMap;
    }
}

