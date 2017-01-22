<?php
/**
 * Created by PhpStorm.
 * User: jackprice-burns
 * Date: 20/01/2017
 * Time: 09:18
 */

namespace App\Classes;


class Hash
{

    public static function hash($plainText, $salt = null){

        if(!is_null($salt)) return crypt($plainText, '$6$' . $salt);

        $salt = openssl_random_pseudo_bytes(64);
        $salt = bin2hex($salt);

        return ['hash'=>crypt($plainText, '$6$' . $salt), 'salt'=>$salt];
    }
}