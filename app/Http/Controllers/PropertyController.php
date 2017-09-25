<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Model\BookModel;

class PropertyController extends BaseController
{
    private $model;

    public function __construct(BookModel $model = null)
    {
        if (is_null($model)) {
            $this->model = new BookModel();
        } else {
            $this->model = $model;
        }
    }

    public function add(Request $request)
    {

        try {
            $result = $request->all();
            $this->model->insertProperty($request->all());
        } catch (\Exception $ex) {
            $result = [
                'Error' => [
                    'message' => $ex->getMessage()
                ]
            ];
        }

        return response()->json($result);
    }

    public function delete($id)
    {

        try {
            $this->model->deleteProperty($id);
            $result = [
                "Success" => [
                    "message" => "Property {$id} is deleted successfully"
                ]
            ];
        } catch (\Exception $ex) {
            $result = [
                'Error' => [
                    'message' => $ex->getMessage()
                ]
            ];
        }

        return response()->json($result);
    }
}
