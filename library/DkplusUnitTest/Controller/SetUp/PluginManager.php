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
    private $plugins = array();

    public function setUpController($controller)
    {
        parent::setupController($controller);

        foreach ($this->plugins as $plugin) {
            /** @var $plugin Plugin\AbstractPlugin */
            $this->pluginMap[$plugin->getName()] = $plugin->createMock();
        }
    }

    public function registerPlugin(Plugin\AbstractPlugin $plugin)
    {
        $this->plugins[$plugin->getName()] = $plugin;
        $this->pluginMap[$plugin->getName()] = $plugin->createMock();
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

