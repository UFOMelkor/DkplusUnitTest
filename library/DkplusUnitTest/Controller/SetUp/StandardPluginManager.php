<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp;

use \PHPUnit_Framework_TestCase as PhpUnitTestCase;

/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
class StandardPluginManager extends PluginManager
{
    public function __construct(\PHPUnit_Framework_TestCase $testCase)
    {
        parent::__construct($testCase);

        $this->registerPlugin(new Plugin\FlashMessenger($testCase));
        $this->registerPlugin(new Plugin\Forward($testCase));
        $this->registerPlugin(new Plugin\Layout($testCase));
        $this->registerPlugin(new Plugin\Redirect($testCase));
        $this->registerPlugin(new Plugin\Url($testCase));
    }
}

