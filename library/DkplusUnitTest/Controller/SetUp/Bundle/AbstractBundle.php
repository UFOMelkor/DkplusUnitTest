<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp\Bundle
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp\Bundle;

use PHPUnit_Framework_TestCase as PhpUnitTestCase;
use Zend\Mvc\Controller\AbstractController;
use DkplusUnitTest\Controller\SetUp\SetUpInterface;

/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp\Bundle
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
abstract class AbstractBundle implements BundleInterface
{
    /** @var array */
    private $setUps = array();

    /** @var PhpUnitTestCase */
    protected $testCase;

    /** @param PhpUnitTestCase $testCase */
    public function __construct(PhpUnitTestCase $testCase)
    {
        $this->testCase = $testCase;

        $this->init();
    }

    protected function init()
    {
    }

    public function setUpController(AbstractController $controller)
    {
        foreach ($this->setUps as $setUp) {
            $setUp->setUpController($controller);
        }
    }

    protected function addSetUp(SetUpInterface $setUp)
    {
        $this->setUps[] = $setUp;
    }
}

