<?php
/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/26/2017
 * Time: 9:06 PM
 */

namespace App\Http\Controllers;


class AdminController
{
    public function user()
    {
        return view('admin.user');
    }
}