<?php
/**
 * @category   DkplusTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusTest
 */

namespace Dkplus\Test\Controller\Setup;

use Zend\Stdlib\DispatchableInterface as Dispatchable;
use Zend\Stdlib\RequestInterface as Request;
use Zend\Stdlib\ResponseInterface as Response;

/**
 * Preparing a controller to be testet with mvc-data.
 *
 * @category   DkplusTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusTest
 */
interface RequestResponseInterface
{
    public function applyToController(Dispatchable $controller);

    /** @return Request|\PHPUnit_Framework_MockObject_MockObject */
    public function getRequest();

    /** @return Response|\PHPUnit_Framework_MockObject_MockObject */
    public function getResponse();
}

