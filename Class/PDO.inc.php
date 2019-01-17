<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 17/01/2019
 * Time: 16:30
 */

include 'pdo.class.php';
try{
    myPDO::setConfiguration("mysql:host=yumenetwymadmin.mysql.db;
        dbname=yumenetwymadmin;charset=utf8",
        $username='yumenetwymadmin',
        $password='Jaimelespates1');
} catch(Exception $e){ 	print("ERROR !"); }

