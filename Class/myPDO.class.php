<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 17/01/2019
 * Time: 16:30
 */

include 'myPDO.template.php';
try{
    /*myPDO::setConfiguration("mysql:host=yumenetwymadmin.mysql.db;dbname=yumenetwymadmin;charset=utf8",
        $username='yumenetwymadmin',
        $password='Jaimelespates1');*/
    myPDO::setConfiguration("mysql:host=localhost;dbname=smash;charset=utf8",
        $username='root',
        $password='root');
} catch(Exception $e){ 	print("ERROR !"); }

