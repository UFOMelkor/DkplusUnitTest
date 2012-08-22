<?php
/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp\Bundle
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */

namespace DkplusUnitTest\Controller\SetUp\Bundle;

use DkplusUnitTest\Controller\SetUp\SetUpInterface;

/**
 * @category   DkplusUnitTest
 * @package    Controller
 * @subpackage SetUp\Bundle
 * @author     Oskar Bley <oskar@programming-php.net>
 * @link       http://github.com/UFOMelkor/DkplusUnitTest
 */
interface BundleInterface extends SetUpInterface
{
    public function applyToController($controller);
}

