<?php
/**
 * Created by PhpStorm.
 * User: Anggarda Gasta
 * Date: 9/25/2017
 * Time: 5:56 PM
 */

namespace App\Model;


class BookModel
{
    /**
     * @param array $field
     * @return bool
     * @throws \Exception
     */
    public function insertProperty($field)
    {
        try {
            $field['created_at'] = \date("Y-m-d H:i:s");
            $field['updated_at'] = \date("Y-m-d H:i:s");
            return \DB::table('property')->insert($field);
        } catch (\Exception $ex) {
            throw $ex;
        }

    }

    public function deleteProperty($id)
    {
        try {
            return \DB::table('property')->where('id', '=', $id)->delete();;
        } catch (\Exception $ex) {
            throw $ex;
        }

    }
}