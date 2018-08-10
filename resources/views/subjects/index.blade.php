@extends('layouts.master')

@section('content')
    <title>iHealth Subjects</title>
    <h1>iHealth Subject ID</h1>
<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 7/11/2018
 * Time: 12:31 PM
 */
echo "The Subjects are:";
echo '<br>';
echo '<br>';
for ($i = 0; $i < count($response_user->UserInfoList); $i++) {

    print_r($response_user->UserInfoList[$i]->userid);
    echo '<br>';
    echo '<hr>';



}

?>

    @endsection
