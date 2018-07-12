<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 6/28/2018
 * Time: 11:31 AM
 */
for($i=0;$i<count($response_user->UserInfoList);$i++)
{
    echo '<hr>';

    print_r("userid is:")."\x20".print_r($response_user->UserInfoList[$i]->userid);

    echo '<br/>';
}

?>