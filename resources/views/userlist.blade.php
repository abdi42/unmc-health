<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 7/11/2018
 * Time: 12:31 PM
 */

for ($i = 0; $i < count($response_user->UserInfoList); $i++) {

    print_r("The userid is: ")."/x20". print_r($response_user->UserInfoList[$i]->userid);



}