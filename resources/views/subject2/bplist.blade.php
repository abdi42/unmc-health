<?php
/**
 * Created by PhpStorm.
 * User: smakandar
 * Date: 6/28/2018
 * Time: 11:42 AM
 */

for ($i=0;$i<count($response_bp_user2->BPDataList);$i++)
{
    echo '<hr>';
    print_r("User ID is:")."\x20".print_r($response_user->UserInfoList[0]->userid);
    echo '<br/>';
    print_r("BPL Value:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->BPL);
    echo '<br/>';
    print_r("Data ID value is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->DataID);
    echo '<br/>';
    print_r("HP value is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->HP);
    echo '<br/>';
    print_r("HR value is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->HR);
    echo '<br/>';
    print_r("IsArr is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->IsArr);
    echo '<br/>';
    print_r("LP value is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->LP);
    echo '<br/>';
    $latest_time = date("Y-m-d\TH:i:s\Z",$response_bp_user2->BPDataList[$i]->LastChangeTime);
    print_r("LastChangeTime is:") . "\x20" . print_r($latest_time);
    echo '<br/>';
    print_r("Lat is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->Lat);
    echo '<br/>';
    print_r("Lon is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->Lon);
    echo '<br/>';
    print_r("MDate is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->MDate);
    echo '<br/>';
    print_r("Note is:") . "\x20" . print_r($response_bp_user2->BPDataList[$i]->Note);
    echo '<br/>';
    print_r("BPL Value:") . "\x20" . print_r($response_bp_user2->BPUnit);
    echo '<br/>';
    print_r("Current Record Count:") . "\x20" . print_r($response_bp_user2->CurrentRecordCount);
    echo '<br/>';
    print_r("Next Page Url is:") . "\x20" . print_r($response_bp_user2->NextPageUrl);
    echo '<br/>';
    print_r("Record Count is:") . "\x20" . print_r($response_bp_user2->RecordCount);
    echo '<br/>';
}