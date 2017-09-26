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

    /**
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function deleteProperty($id)
    {
        try {
            return \DB::table('property')->where('id', '=', $id)->delete();;
        } catch (\Exception $ex) {
            throw $ex;
        }

    }

    /**
     * @param array $field
     * @return mixed
     * @throws \Exception
     */
    public function insertImages($field)
    {
        try {
            $field['created_at'] = \date("Y-m-d H:i:s");
            $field['updated_at'] = \date("Y-m-d H:i:s");
            return \DB::table('images')->insert($field);
        } catch (\Exception $ex) {
            throw $ex;
        }

    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDistinctCountry()
    {
        try {
            return \DB::table('property')->distinct()->get(['country']);
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDistinctState()
    {
        try {
            return \DB::table('property')->distinct()->get(['state']);
        } catch (\Exception $ex) {
            throw $ex;
        }

    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDistinctPropertyType()
    {
        try {
            return \DB::table('property')->distinct()->get(['type']);
        } catch (\Exception $ex) {
            throw $ex;
        }

    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getDistinctPrice()
    {
        try {
            return \DB::table('property')->distinct()->get(['price']);
        } catch (\Exception $ex) {
            throw $ex;
        }

    }

    public function searchProperties(Array $field)
    {
        try {
            $properties = \DB::table('property')
                ->select(['property.*', 'user.email', 'images.path'])
                ->join('user', 'property.id_user', '=', 'user.id')
                ->join('images', 'property.id', '=', 'images.id_property')
                ->where('country', '=', $field['country'])
                ->where('bedroom', '=', $field['bedroom'])
                ->where('state', '=', $field['state'])
                ->where('bathroom', '=', $field['bathroom'])
                ->where('pets', '=', $field['pets'])
                ->where('property.type', '=', $field['type'])
                ->where('price', '>=', $field['minprice'])
                ->get();

            return $properties;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function insertTravellerUser($field)
    {
        try {
            $field['verified'] = 'no';
            $field['type'] = 'traveller';
            $field['created_at'] = \date("Y-m-d H:i:s");
            $field['updated_at'] = \date("Y-m-d H:i:s");
            return \DB::table('user')->insert($field);
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function checkEmail($email)
    {
        try {
            return \DB::table('user')
                ->where('email', '=', $email)
                ->get(['email']);
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Get all users
     *
     * @return mixed
     * @throws \Exception
     */
    public function getUsers()
    {
        try {
            return \DB::table('user')->get(['id', 'email', 'type','verified', 'updated_at']);
        } catch (\Exception $ex) {
            throw $ex;
        }

    }
}