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

namespace Dkplus\Test\Controller\Setup\Plugin;

use PHPUnit_Framework_TestCase as PhpUnitTestCase;
use Zend\Mvc\InjectApplicationEventInterface;

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
abstract class AbstractPlugin
{
    /** @var PhpUnitTestCase */
    protected $testCase;

    /** @var \PHPUnit_Framework_MockObject_MockObject */
    protected $mock;

    public function __construct(PhpUnitTestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    /** @return \PHPUnit_Framework_MockObject_MockObject */
    public function getMock()
    {
        return $this->mock;
    }

    /** @return \PHPUnit_Framework_MockObject_MockObject */
    abstract public function createMock();

    /** @return string */
    abstract public function getName();
}

