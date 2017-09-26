<?php
/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/26/2017
 * Time: 9:06 PM
 */

namespace App\Http\Controllers;

use App\Model\BookModel;


class AdminController implements ControllerInterface
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

    /**
     * get all users data
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user()
    {
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
        $books = [];
        try {
            $books = $this->model->getAllBooks();
        } catch (\Exception $ex) {
            syslog(LOG_ERR, "[ALL-BOOKS] Error - {$ex->getMessage()}");
        }

        return view('admin.book', ['books' => $books]);
    }
}