<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp\Bundle
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp\Bundle;

use DkplusUnitTest\Controller\SetUp;

/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp\Bundle
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
class HttpBundle extends AbstractBundle
{
    /** @var SetUp\PhpEnvironmentRequestResponse */
    private $requestResponseSetUp;

    /** @var SetUp\MvcEvent */
    private $mvcEventSetUp;

    protected function init()
    {
        $this->requestResponseSetUp = new SetUp\PhpEnvironmentRequestResponse($this->testCase);
        $this->mvcEventSetUp        = new SetUp\MvcEvent($this->testCase);

        $this->addSetUp($this->mvcEventSetUp);
        $this->addSetUp($this->requestResponseSetUp);
    }

    /** @return \Zend\Mvc\MvcEvent|\PHPUnit_Framework_MockObject_MockObject */
    public function getEvent()
    {
        return $this->mvcEventSetUp->getMvcEvent();
    }

    /** @return \Zend\Mvc\Router\RouteMatch|\PHPUnit_Framework_MockObject_MockObject */
    public function getRouteMatch()
    {
        return $this->mvcEventSetUp->getRouteMatch();
    }

    /** @return \Zend\Http\PhpEnvironment\Request|\PHPUnit_Framework_MockObject_MockObject */
    public function getRequest()
    {
        return $this->requestResponseSetUp->getRequest();
    }

    /** @return \Zend\Http\PhpEnvironment\Response|\PHPUnit_Framework_MockObject_MockObject */
    public function getResponse()
    {
        return $this->requestResponseSetUp->getResponse();
    }

    public function setPostData(array $data, $isPostRequest = true)
    {
        $this->requestResponseSetUp->setPostData($data, $isPostRequest);
    }

    public function setQueryData(array $data, $isGetRequest = true)
    {
        $this->requestResponseSetUp->setQueryData($data, $isGetRequest);
    }

    public function setXmlHttpRequest($flag)
    {
        $this->requestResponseSetUp->setXmlHttpRequest($flag);
    }

    public function setRouteMatchParams(array $params)
    {
        $this->mvcEventSetUp->setRouteMatchParams($params);
    }

    public function setMatchedRouteName($name)
    {
        $this->mvcEventSetUp->setMatchedRouteName($name);
    }
}

