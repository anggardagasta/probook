<?php
/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/25/2017
 * Time: 7:16 PM
 */

namespace App\Http\Controllers;


class DateHelper
{
    public function currentDate()
    {
        return new \DateTime();
    }
}