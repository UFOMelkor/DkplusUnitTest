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

/**
 *
 * @category   Dkplus
 * @package    Test
 * @subpackage Controller
 * @author     Oskar Bley <oskar@steppenhahn.de>
 * @license    http://creativecommons.org/licenses/by-sa/3.0/ CC BY-SA 3.0
 * @version    Release: $Revision$
 * @link       http://lib.dkplus.org/
 */
class FlashMessenger extends AbstractPlugin
{
    /** @return \PHPUnit_Framework_MockObject_MockObject */
    public function createMock()
    {
        $this->mock =  $this->testCase->getMock('Zend\Mvc\Controller\Plugin\FlashMessenger');
        return $this->mock;
    }

    /** @return string */
    public function getName()
    {
        return 'flashMessenger';
    }
}

