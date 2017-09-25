<?php
/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/25/2017
 * Time: 7:30 PM
 */

namespace Tests\Probook;

use Tests\TestCase;
use App\Http\Controllers\ImagesController;

class ImagesTest extends TestCase
{
    public function testPostImages()
    {

        $model = \Mockery::mock('\App\Model\BookModel');
        $model->shouldReceive('insertImages')->andReturn(true);

        $uploadFile = \Mockery::mock('\Symfony\Component\HttpFoundation\File\UploadedFile');
        $uploadFile->shouldReceive('move')->andReturn(true);
        $uploadFile->shouldReceive('getClientOriginalExtension')->andReturn('jpg');
        $uploadFile->shouldReceive('isValid')->andReturn($uploadFile);
        $uploadFile->shouldReceive('file')->andReturn($uploadFile);

        $dateHelper = \Mockery::mock('App\Http\Controllers\DateHelper');
        $dateHelper->shouldReceive('currentDate')->andReturn(new \DateTime('2017-11-11'));

        $request = \Mockery::mock('\Illuminate\Http\Request');
        $request->shouldReceive('file')->once()->andReturn(['images', 'image2']);
        $request->shouldReceive('file')->andReturn($uploadFile);

        $controller = new ImagesController($model);
        $controller->setDateHelper($dateHelper);
        $result = $controller->add($request, 1);

        $actual = (json_decode(json_encode($result), true))['original'];

        $this->assertEquals(array(
            'Success' =>
                array(
                    'message' => 'All images have been added',
                ),
        ), $actual);
    }

    public function testFailPostImages()
    {

        $model = \Mockery::mock('\App\Model\BookModel');
        $model->shouldReceive('insertImages')->andReturn(true);

        $dateHelper = \Mockery::mock('App\Http\Controllers\DateHelper');
        $dateHelper->shouldReceive('currentDate')->andReturn(new \DateTime('2017-11-11'));

        $request = \Mockery::mock('\Illuminate\Http\Request');
        $request->shouldReceive('file')->once()->andReturn(['images', 'image2']);
        $request->shouldReceive('file')->andThrow(new \Exception("error test"));

        $controller = new ImagesController($model);
        $controller->setDateHelper($dateHelper);
        $result = $controller->add($request, 1);

        $actual = (json_decode(json_encode($result), true))['original'];

        $this->assertEquals(array(
            'Error' =>
                array(
                    'message' => 'Unexpected error when add image',
                ),
        ), $actual);
    }
}