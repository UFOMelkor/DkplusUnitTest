<?php
/**
 * @category DkplusUnitTest
 * @package  Controller
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller;

/**
 * Extension of phpunit-testcase with some utily functions for controller-tests.
 *
 * @category DkplusUnitTest
 * @package  Controller
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusUnitTest
 */
class StandardTestCase extends TestCase
{
    /** @var SetUp\PluginManagerInterface */
    protected $pluginManager;

    /** @var SetUp\Bundle\HttpBundle */
    protected $httpBundle;

    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->initSetup();
    }


    protected function initSetUp()
    {
        $this->pluginManager = new SetUp\StandardPluginManager($this);
        $this->httpBundle    = new SetUp\Bundle\HttpBundle($this);

        $this->addSetUp($this->pluginManager);
        $this->addSetUp($this->httpBundle);
    }

    protected function addPlugin(SetUp\Plugin\AbstractPlugin $plugin)
    {
        $this->pluginManager->registerPlugin($plugin);
    }

    /** @return \Zend\Mvc\MvcEvent|\PHPUnit_Framework_MockObject_MockObject */
    protected function getEvent()
    {
        return $this->httpBundle->getEvent();
    }

    /** @return \Zend\Mvc\Router\RouteMatch|\PHPUnit_Framework_MockObject_MockObject */
    protected function getRouteMatch()
    {
        return $this->httpBundle->getRouteMatch();
    }

    /** @return \Zend\Http\PhpEnvironment\Request|\PHPUnit_Framework_MockObject_MockObject */
    protected function getRequest()
    {
        return $this->httpBundle->getRequest();
    }

    /** @return \Zend\Http\PhpEnvironment\Response|\PHPUnit_Framework_MockObject_MockObject */
    protected function getResponse()
    {
        return $this->httpBundle->getResponse();
    }

    protected function setPostData(array $data, $isPostRequest = true)
    {
        $this->httpBundle->setPostData($data, $isPostRequest);
    }

    protected function setQueryData(array $data, $isGetRequest = true)
    {
        $this->httpBundle->setQueryData($data, $isGetRequest);
    }

    protected function setXmlHttpRequest($flag)
    {
        $this->httpBundle->setXmlHttpRequest($flag);
    }

    protected function setRouteMatchParams(array $params)
    {
        $this->httpBundle->setRouteMatchParams($params);
    }

    protected function setMatchedRouteName($name)
    {
        $this->httpBundle->setMatchedRouteName($name);
    }

    /** @return \PHPUnit_Framework_MockObject_MockObject */
    protected function plugin($name)
    {
        return $this->pluginManager->getPlugin($name);
    }

    protected function registerPlugin(SetUp\Plugin\AbstractPlugin $plugin)
    {
        $this->pluginManager->registerPlugin($plugin);
    }

    public function expectsRedirectToRoute(
        $route = null,
        array $params = array(),
        $options = array(),
        $reuseMatchedParams = false
    ) {
        $this->plugin('redirect')->expects($this->once())
                                ->method('toRoute')
                                ->with($route, $params, $options, $reuseMatchedParams);
    }

    public function expectsRedirectToUrl($url)
    {
        $this->plugin('redirect')->expects($this->once())
                                 ->method('toUrl')
                                 ->with($url);
    }

    public function expectsFlashMessengerToSetNamespace($namespace)
    {
        $this->plugin('flashMessenger')->expects($this->once())
                                       ->method('setNamespace')
                                       ->with($namespace);
    }

    public function expectsFlashMessengerToAddMessage($message)
    {
        $this->plugin('flashMessenger')->expects($this->once())
                                       ->method('addMessage')
                                       ->with($message);
    }
}

