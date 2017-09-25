<?php
/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/25/2017
 * Time: 8:46 PM
 */

namespace App\Http\Controllers;

use App\Model\BookModel;
use Illuminate\Http\Request;


class HomeController
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

    private function getCountry()
    {
        $country = [];
        try {
            $country = $this->model->getDistinctCountry();
        } catch (\Exception $ex) {
            syslog(LOG_ERR, "[Country] Fail to retrieve countries");
        }

        return $country;
    }

    private function getState()
    {
        $state = [];
        try {
            $state = $this->model->getDistinctState();
        } catch (\Exception $ex) {
            syslog(LOG_ERR, "[State] Fail to retrieve states");
        }

        return $state;
    }

    private function getPrice()
    {
        $result = [];
        try {
            $result = $this->model->getDistinctPrice();
        } catch (\Exception $ex) {
            syslog(LOG_ERR, "[Price] Fail to retrieve pricing");
        }

        return $result;
    }

    private function getPropertyType()
    {
        $result = [];
        try {
            $result = $this->model->getDistinctPropertyType();
        } catch (\Exception $ex) {
            syslog(LOG_ERR, "[Property-Type] Fail to retrieve property type");
        }

        return $result;
    }

    /**
     * @param array $fields
     * @return array
     */
    private function getProperties(Array $fields)
    {
        $result = [];
        try {
            $result = $this->model->searchProperties($fields);
        } catch (\Exception $ex) {
            syslog(LOG_ERR, "[Properties] Fail to retrieve property type");
        }

        return $result;
    }

    public function index()
    {
        $data = [
            'countries' => $this->getCountry(),
            'states' => $this->getState(),
            'types' => $this->getPropertyType(),
            'price' => $this->getPrice()
        ];
        return view('index', $data);
    }

    public function searchList()
    {
        return view('searchlist');
    }

    public function search(Request $request)
    {
        $properties = $this->getProperties($request->all());
        return view('searchresult', ['properties' => $properties]);
    }
}