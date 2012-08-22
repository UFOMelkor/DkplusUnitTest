<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp;

use PHPUnit_Framework_TestCase as PhpUnitTestCase;
use Zend\Stdlib\DispatchableInterface as Dispatchable;
use Zend\Http\PhpEnvironment\Request as Request;
use Zend\Http\PhpEnvironment\Response as Response;

/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
class PhpEnvironmentRequestResponse implements RequestResponseInterface
{
    /** @var TestCase */
    protected $testCase;

    /** @var Request|\PHPUnit_Framework_MockObject_MockObject */
    protected $request;

    /** @var Response|\PHPUnit_Framework_MockObject_MockObject */
    protected $response;

    public function __construct(PhpUnitTestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function applyToController(Dispatchable $controller)
    {
        $this->request    = $this->createRequest();
        $this->response   = $this->createResponse();

        $controller->dispatch($this->request, $this->response);
    }


    /** @return Request|\PHPUnit_Framework_MockObject_MockObject */
    private function createRequest()
    {
        $request = $this->testCase->getMock('Zend\Http\PhpEnvironment\Request');
        $request->expects($this->testCase->any())
                ->method('getParams')
                ->will($this->testCase->returnValue(array()));
        return $request;
    }

    /** @return Response|\PHPUnit_Framework_MockObject_MockObject */
    private function createResponse()
    {
        return $this->testCase->getMock('Zend\Http\PhpEnvironment\Response');
    }

    /** @return Request|\PHPUnit_Framework_MockObject_MockObject */
    public function getRequest()
    {
        return $this->request;
    }

    /** @return Response|\PHPUnit_Framework_MockObject_MockObject */
    public function getResponse()
    {
        return $this->response;
    }

    public function setQueryData(array $data, $isGetRequest = true)
    {
        $this->request->expects($this->testCase->any())
                      ->method('getQuery')
                      ->will(
                          $this->testCase->returnCallback(
                              function ($key = null, $default = null) use ($data) {
                                  if ($key === null) {
                                      return $data;
                                  }

                                  if (\array_key_exists($key, $data)) {
                                      return $data[$key];
                                  }

                                  return $default;
                              }
                          )
                      );

        if ($isGetRequest) {
            $this->request->expects($this->testCase->any())
                          ->method('getMethod')
                          ->will($this->testCase->returnValue(Request::METHOD_GET));
        }
    }

    public function setPostData(array $data, $isPostRequest = true)
    {
        $this->request->expects($this->testCase->any())
                      ->method('getPost')
                      ->will(
                          $this->testCase->returnCallback(
                              function ($key = null, $default = null) use ($data) {
                                  if ($key === null) {
                                      return $data;
                                  }

                                  if (\array_key_exists($key, $data)) {
                                      return $data[$key];
                                  }

                                  return $default;
                              }
                          )
                      );

        if ($isPostRequest) {
            $this->request->expects($this->testCase->any())
                          ->method('getMethod')
                          ->will($this->testCase->returnValue(Request::METHOD_POST));
        }
    }

    /** @param boolean */
    public function setXmlHttpRequest($flag)
    {
        $this->getRequest()->expects($this->testCase->any())
                           ->method('isXmlHttpRequest')
                           ->will($this->returnValue($flag));
    }
}

