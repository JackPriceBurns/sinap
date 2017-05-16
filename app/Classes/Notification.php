<?php
/**
 * Created by PhpStorm.
 * User: jackprice-burns
 * Date: 11/02/2017
 * Time: 13:33
 */

namespace app\Classes;


class Notification
{

    public static function get()
    {
        return [['message' => 'This is a test notification']];
    }

}