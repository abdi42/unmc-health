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
    print_r("CurrentRecordCount is:")."\x20".print_r($response_user->CurrentRecordCount);
    echo '<br/>';
    print_r("HeightUnit is:")."\x20".print_r($response_user->HeightUnit);
    echo '<br/>';
    print_r("NextPageUrl is:")."\x20".print_r($response_user->NextPageUrl);
    echo '<br/>';
    print_r("PageNumber is:")."\x20".print_r($response_user->PageNumber);
    echo '<br/>';
    print_r("PrevPageUrl is:")."\x20".print_r($response_user->PrevPageUrl);
    echo '<br/>';
    print_r("RecordCount is:")."\x20".print_r($response_user->RecordCount);
    echo '<br/>';
    print_r("Date of Birth is:")."\x20".print_r($response_user->UserInfoList[$i]->dateofbirth);
    echo '<br/>';
    print_r("Gender is:")."\x20".print_r($response_user->UserInfoList[$i]->gender);
    echo '<br/>';
    print_r("Height is:")."\x20".print_r($response_user->UserInfoList[$i]->height);
    echo '<br/>';
    print_r("Logo:")."\x20".print_r($response_user->UserInfoList[$i]->logo);
    echo '<br/>';
    print_r("Nickname is:")."\x20".print_r($response_user->UserInfoList[$i]->nickname);
    echo '<br/>';
    print_r("userid is:")."\x20".print_r($response_user->UserInfoList[$i]->userid);
    echo '<br/>';
    print_r("weight is:")."\x20".print_r($response_user->UserInfoList[$i]->weight);
    echo '<br/>';
    print_r("Weight Unit is:")."\x20".print_r($response_user->WeightUnit);
    echo '<br/>';
}

?>