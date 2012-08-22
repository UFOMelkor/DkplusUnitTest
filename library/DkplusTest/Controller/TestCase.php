<?php
/**
 * @category DkplusUnitTest
 * @package  Controller
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller;

use DkplusUnitTest\TestCase as BaseTestCase;

/**
 * Test case that can have different setUps to provide mocks for controller
 * unit testing.
 *
 * @category DkplusUnitTest
 * @package  Controller
 * @author   Oskar Bley <oskar@programming-php.net>
 * @link     http://github.com/UFOMelkor/DkplusUnitTest
 */
class TestCase extends BaseTestCase
{
    /** @var array */
    protected $setUps = array();

    protected function addSetUp(SetUp\SetUpInterface $setUp)
    {
        $this->setUps[] = $setUp;
    }

    protected function setUpController($controller)
    {
        foreach ($this->setUps as $setUp) {
            $setUp->applyToController($controller);
        }
    }
}

