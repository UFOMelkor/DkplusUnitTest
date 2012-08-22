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

/**
 * Adding a mocked plugin manager to the controller.
 *
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
interface PluginManagerInterface
{
    public function setUpController(Controller $controller);

    public function registerPlugin(Plugin\AbstractPlugin $plugin);

    /** @return \PHPUnit_Framework_MockObject_MockObject */
    public function getPlugin($name);
}

