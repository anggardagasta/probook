<?php
/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/25/2017
 * Time: 7:09 PM
 */

namespace App\Http\Controllers;

use App\Model\BookModel;
use Illuminate\Http\Request;


class ImagesController implements ControllerInterface
{
    private $model;
    private $dateHelper;

    public function __construct(BookModel $model = null)
    {
        if (is_null($model)) {
            $this->model = new BookModel();
        } else {
            $this->model = $model;
        }
    }

    public function add(Request $request, $property_id)
    {
        $field = ['id_property' => $property_id];

        if ($this->dateHelper) {
            $dateHelper = $this->dateHelper;
        } else {
            $dateHelper = new DateHelper();
        }
        $dateTime = $dateHelper->currentDate();

        $count = count($request->file());
        $destinationPath = "files/images/{$property_id}";
        $success = true;
        for ($i = 1; $i <= $count; $i++) {
            try {
                $key = "image{$i}";
                $file = $request->file($key);
                if ($file->isValid()) {
                    $fileName = "{$key}_" . $dateTime->getTimestamp() . "." . $file->getClientOriginalExtension();
                    $file->move($destinationPath, $fileName);
                    $field['path'] = $destinationPath . "/" . $fileName;
                    $this->model->insertImages($field);
                }
            } catch (\Exception $ex) {
                $success = false;
                syslog(LOG_ERR, "[Images] Property ID: {$property_id} - {$ex->getMessage()}");
            }

        }

        if ($success) {
            $result = [
                'Success' => [
                    'message' => 'All images have been added'
                ]
            ];
        } else {
            $result = [
                'Error' => [
                    'message' => 'Unexpected error when add image'
                ]
            ];
        }

        return response()->json($result);
    }

    /**
     * @param DateHelper $dateHelper
     */
    public function setDateHelper(DateHelper $dateHelper)
    {
        $this->dateHelper = $dateHelper;
    }
}