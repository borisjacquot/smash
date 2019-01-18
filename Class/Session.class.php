<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 18/01/2019
 * Time: 13:51
 */

class Session extends Exception {
    public static function start() {
        if(headers_sent() || session_status() == 2 || session_status() == 0) {
            throw new Exception("La session n'a pas pu être crée.");
        } else {
            session_start();
        }
    }
}
