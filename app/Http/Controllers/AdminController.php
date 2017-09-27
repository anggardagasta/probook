<?php
/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/26/2017
 * Time: 9:06 PM
 */

namespace App\Http\Controllers;

use App\Model\BookModel;
use Illuminate\Http\Request;

class AdminController implements ControllerInterface
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

    /**
     * redirect if user except admin is trying to access this page
     *
     */
    private function needRedirect()
    {
        $result = false;
        if (\Auth::user()) {
            if (\Auth::user()->type != 'admin') {
                $result = true;
            }
        }

        return $result;
    }

    /**
     * get all users data
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user()
    {
        if ($this->needRedirect()) {
            return redirect()->route('home');
        }
        $users = [];
        try {
            $users = $this->model->getUsers();
        } catch (\Exception $ex) {
            syslog(LOG_ERR, "[ALL-USERS] Error - {$ex->getMessage()}");
        }

        return view('admin.user', ['users' => $users]);
    }

    /**
     * get all booking data
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function book()
    {
        if ($this->needRedirect()) {
            return redirect()->route('home');
        }
        $books = [];
        try {
            $books = $this->model->getAllBooks();
        } catch (\Exception $ex) {
            syslog(LOG_ERR, "[ALL-BOOKS] Error - {$ex->getMessage()}");
        }

        return view('admin.book', ['books' => $books]);
    }

    public function bookNow(Request $request)
    {
        try {
            if ($this->dateHelper) {
                $currentDate = $this->dateHelper->currentDate();
            } else {
                $currentDate = (new DateHelper())->currentDate();
            }
            $field = $request->all();
            $field['book_date'] = $currentDate->format('Y-m-d');
            $this->model->insertBooking($field);

            $user = $this->model->getUserById($request->input('id_user'));
            $property = $this->model->getPropertyById($request->input('id_property'));
            $agent = $this->model->getUserById($property->id_user);

            $datetime1 = new \DateTime($field['start_date']);
            $datetime2 = new \DateTime($field['end_date']);
            $interval = $datetime1->diff($datetime2);
            $priceCalculation = $interval->days * $property->price;

            $detail = [
                "email" => $user->email,
                "property_name" => $property->title,
                "location" => "{$property->state}, {$property->country}",
                "start_date" => $request->input("start_date"),
                "end_date" => $request->input("end_date"),
                "book_date" => $currentDate->format("Y-m-d"),
                "agent_email" => $agent->email,
                "price" => $priceCalculation
            ];

            return view('print', ['detail' => $detail]);
        } catch (\Exception $ex) {
            syslog(LOG_ERR, "Error booking - {$ex->getMessage()}");
        }
    }

    /**
     * @param DateHelper $dateHelper
     */
    public function setDateHelper(DateHelper $dateHelper)
    {
        $this->dateHelper = $dateHelper;
    }
}