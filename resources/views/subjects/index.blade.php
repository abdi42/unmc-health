@extends('layouts.master')


<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 7/11/2018
 * Time: 12:31 PM
 */
echo "The Subjects are:";
echo '<br>';
for ($i = 0; $i < count($response_user->UserInfoList); $i++) {

    print_r($response_user->UserInfoList[$i]->userid);
    echo '<br>';



}

?>