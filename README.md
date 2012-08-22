DkplusUnitTest
==========

Zend Framework 2 Controller Unit Testing

Supports mocking of request, response, event, routematch and plugins.


Controller:
```php
<?php
namespace MyModule\Controller;

class IndexController
{
    public function indexAction()
    {
        $id = $this->getRequest()->getQuery('id');

        return array('id' => $id);
    }
}
```

TestCase:
```php
<?php
namespace MyModuleTest\Controller;

use DkplusUnitTest\Controller\StandardTestCase;

class IndexControllerTest extends StandardTestCase
{
    private $controller;

    public function setUp()
    {
        $this->controller = \new MyModule\Controller\IndexController();
        $this->setUpController($this->controller);
    }

    public function testIndexActionReturnsIdFromQuery()
    {
        $this->setQueryData(array($id => 42));

        $result = $this->controller->indexAction();
        $this->assertEquals(42, $result['id']);
    }
}
```