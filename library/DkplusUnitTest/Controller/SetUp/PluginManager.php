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
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
class PluginManager extends AbstractPluginManager
{

    /** @var Plugin\AbstractPlugin[] */
    private $plugins = array();

    public function setUpController($controller)
    {
        parent::setupController($controller);

        foreach ($this->plugins as $plugin) {
            $mock = $plugin->createMock();
            $names = \is_array($plugin->getName())
                   ? $plugin->getName()
                   : array($plugin->getName());

            foreach ($names as $name) {
                $this->pluginMap[$name] = $mock;
            }
        }
    }

    public function registerPlugin(Plugin\AbstractPlugin $plugin)
    {
        $mock  = $plugin->createMock();
        $names = \is_array($plugin->getName())
               ? $plugin->getName()
               : array($plugin->getName());

        foreach ($names as $name) {
            $this->plugins[$name]   = $plugin;
            $this->pluginMap[$name] = $mock;
        }
    }

    /** @return \PHPUnit_Framework_MockObject_MockObject */
    public function getPlugin($name)
    {
        if (empty($this->pluginMap[$name])) {
            throw new \InvalidArgumentException("There is no plugin named '$name' registered");
        }
        return $this->pluginMap[$name];
    }
}

