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

namespace Dkplus\Test\Controller\Setup;

use Zend\Mvc\Controller\AbstractController as Controller;

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
interface PluginManagerInterface
{
    public function applyToController(Controller $controller);

    public function registerPlugin($name, $plugin);
}

