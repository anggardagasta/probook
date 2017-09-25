<?php

/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/25/2017
 * Time: 6:29 PM
 */

namespace Tests\Probook;

use Tests\TestCase;
use App\Http\Controllers\PropertyController;

class PropertyTest extends TestCase
{
    private $req = '{
        "id_user": 2,
        "title": "The Great House",
        "bedroom": 2,
        "bathroom": 2,
        "description": "Stay at here, and you\'ll never forget",
        "price": 85.5,
        "type": "house",
        "state": "Bandung",
        "country": "Indonesia",
        "pets": "yes"
    }';

    public function testPostProperty()
    {

        $model = \Mockery::mock('App\Model\BookModel');
        $model->shouldReceive('insertProperty')->andReturn(true);

        $request = \Mockery::mock('Illuminate\Http\Request');
        $request->shouldReceive('all')->andReturn(json_decode($this->req, true));

        $controller = new PropertyController($model);
        $result = $controller->add($request);

        $actual = (json_decode(json_encode($result), true))['original'];

        $this->assertEquals(json_decode($this->req, true), $actual);
    }

    public function testPostPropertyButFailInsertIntoDatabase()
    {

        $model = \Mockery::mock('App\Model\BookModel');
        $model->shouldReceive('insertProperty')->andThrow(new \Exception('fail to insert'));

        $request = \Mockery::mock('Illuminate\Http\Request');
        $request->shouldReceive('all')->andReturn(json_decode($this->req, true));

        $controller = new PropertyController($model);
        $result = $controller->add($request);

        $actual = (json_decode(json_encode($result), true))['original'];

        $this->assertEquals(array(
            'Error' =>
                array(
                    'message' => 'fail to insert',
                ),
        ), $actual);
    }
}