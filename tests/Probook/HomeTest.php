<?php
/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/25/2017
 * Time: 10:45 PM
 */

namespace Tests\Probook;

use Tests\TestCase;
use App\Http\Controllers\HomeController;

class HomeTest extends TestCase
{
    public function testGetCountries()
    {
        $model = \Mockery::mock('\App\Model\BookModel');
        $model->shouldReceive('getDistinctCountry')->andReturn([true]);

        $controller = new HomeController($model);

        $actual = $this->invokeMethod($controller, 'getCountry', []);
        $this->assertEquals([true], $actual);

    }

    public function testGetPropertyType()
    {
        $model = \Mockery::mock('\App\Model\BookModel');
        $model->shouldReceive('getDistinctPropertyType')->andReturn([true]);

        $controller = new HomeController($model);

        $actual = $this->invokeMethod($controller, 'getPropertyType', []);
        $this->assertEquals([true], $actual);

    }

    public function testGetState()
    {
        $model = \Mockery::mock('\App\Model\BookModel');
        $model->shouldReceive('getDistinctState')->andReturn([true]);

        $controller = new HomeController($model);

        $actual = $this->invokeMethod($controller, 'getState', []);
        $this->assertEquals([true], $actual);

    }

    public function testGetPrice()
    {
        $model = \Mockery::mock('\App\Model\BookModel');
        $model->shouldReceive('getDistinctPrice')->andReturn([true]);

        $controller = new HomeController($model);

        $actual = $this->invokeMethod($controller, 'getPrice', []);
        $this->assertEquals([true], $actual);

    }

    public function testGetProperties()
    {
        $model = \Mockery::mock('\App\Model\BookModel');
        $model->shouldReceive('searchProperties')->andReturn([true]);

        $controller = new HomeController($model);

        $actual = $this->invokeMethod($controller, 'getProperties', [['test']]);
        $this->assertEquals([true], $actual);

    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod($object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}