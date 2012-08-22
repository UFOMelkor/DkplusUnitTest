<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp;

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
    public function setUpController($controller);

    public function registerPlugin(Plugin\AbstractPlugin $plugin);

    /** @return \PHPUnit_Framework_MockObject_MockObject */
    public function getPlugin($name);
}

