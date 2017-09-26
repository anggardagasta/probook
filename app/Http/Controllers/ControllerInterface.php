<?php
/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/26/2017
 * Time: 9:49 PM
 */

namespace App\Http\Controllers;

use App\Model\BookModel;


interface ControllerInterface
{
    public function __construct(BookModel $model = null);
}