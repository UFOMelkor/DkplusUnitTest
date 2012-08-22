<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp;

use Zend\Stdlib\RequestInterface as Request;
use Zend\Stdlib\ResponseInterface as Response;

/**
 * Setting up a request and a response mock for the controller.
 *
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
interface RequestResponseInterface extends SetUpInterface
{
    public function setUpController($controller);

    /** @return Request|\PHPUnit_Framework_MockObject_MockObject */
    public function getRequest();

    /** @return Response|\PHPUnit_Framework_MockObject_MockObject */
    public function getResponse();
}

