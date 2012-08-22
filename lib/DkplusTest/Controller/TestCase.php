<?php
/**
 * @category DkplusTest
 * @package  Controller
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusTest
 */

namespace Dkplus\Test\Controller;

use DkplusTest\TestCase as BaseTestCase;
use Zend\Mvc\Controller\AbstractController as Controller;

/**
 * Extension of phpunit-testcase with some utily functions for controller-tests.
 *
 * @category DkplusTest
 * @package  Controller
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusTest
 */
class TestCase extends BaseTestCase
{
    /** @var Controller */
    private $controller;

    /** @var Setup\MvcEventInterface */
    protected $mvcEventSetup;

    /** @var Setup\RequestResponseInterface|Setup\PhpEnvironmentRequestResponse */
    protected $requestResponseSetup;

    /** @var Setup\PluginManagerInterface */
    protected $pluginManagerSetup;

    /** @var array */
    protected $pluginGenerators = array();

    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->mvcEventSetup        = new Setup\MvcEvent($this);
        $this->requestResponseSetup = new Setup\PhpEnvironmentRequestResponse($this);
        $this->pluginManagerSetup   = new Setup\PluginManager($this);

        $this->pluginGenerators[] = new Setup\Plugin\FlashMessenger($this);
        $this->pluginGenerators[] = new Setup\Plugin\Forward($this);
        $this->pluginGenerators[] = new Setup\Plugin\Layout($this);
        $this->pluginGenerators[] = new Setup\Plugin\Redirect($this);
        $this->pluginGenerators[] = new Setup\Plugin\Url($this);
        $this->pluginGenerators[] = new Setup\Plugin\Dsl($this);

    }

    protected function setController(ActionController $controller)
    {
        $this->controller = $controller;
        $this->mvcEventSetup->applyToController($controller);
        $this->requestResponseSetup->applyToController($controller);
        $this->pluginManagerSetup->applyToController($controller);

        foreach ($this->pluginGenerators as $pluginGenerator) {
            /* @var Setup\Plugin\AbstractPlugin */
            $this->pluginManagerSetup->registerPlugin($pluginGenerator->getName(), $pluginGenerator->createMock());
        }
    }

    /** @return ActionController */
    protected function getController()
    {
        return $this->controller;
    }

    /** @return \Zend\Mvc\MvcEvent */
    protected function getEvent()
    {
        return $this->mvcEventSetup->getMvcEvent();
    }

    /** @return \Zend\Mvc\Router\RouteMatch */
    protected function getRouteMatch()
    {
        return $this->mvcEventSetup->getRouteMatch();
    }

    /** @return \Zend\Http\PhpEnvironment\Request */
    protected function getRequest()
    {
        return $this->requestResponseSetup->getRequest();
    }

    /** @return \Zend\Http\PhpEnvironment\Response */
    protected function getResponse()
    {
        return $this->requestResponseSetup->getResponse();
    }

    protected function setPostData(array $data, $isPostRequest = true)
    {
        $this->requestResponseSetup->setPostData($data, $isPostRequest);
    }

    protected function setQueryData(array $data, $isGetRequest = true)
    {
        $this->requestResponseSetup->setQueryData($data, $isGetRequest);
    }

    protected function setXmlHttpRequest($flag)
    {
        $this->requestResponseSetup->setXmlHttpRequest($flag);
    }

    protected function setRouteMatchParams(array $params)
    {
        $this->mvcEventSetup->setRouteMatchParams($params);
    }

    protected function setMatchedRouteName($name)
    {
        $this->mvcEventSetup->setMatchedRouteName($name);
    }

    /** @return \PHPUnit_Framework_MockObject_MockObject */
    protected function plugin($name)
    {
        foreach ($this->pluginGenerators as $pluginGenerator) {
            /* @var Setup\Plugin\AbstractPlugin */
            if ($pluginGenerator->getName() == $name) {
                return $pluginGenerator->getMock();
            }
        }
        throw new \InvalidArgumentException("Could not find plugin named '$name'");
    }
}

