<?php
ini_set('max_execution_time', '30000'); //300 seconds = 5 minutes
date_default_timezone_set('Australia/Melbourne');

echo date("Y-m-d H:i:s");
echo '<pre>';
$filterUsers = [];
$myfileUsers = fopen("users.txt", "w") or die("Unable to open file!");
$dateLogs = date("Y_m_d_H_i");
$myfile = fopen("logs.txt", "w") or die("Unable to open file!");

function getAMSUSers()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ams.ausport.gov.au/vis/api/v1/usersearch?informat=json&format=json',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{"identification":[]}',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic dW5pZmllZC5jb25uZWN0b3I6TmxFbHFHNE43NSEj',
            'Content-Type: application/json',
            'Cookie: JSESSIONID=eDQ37jPENWuJ+ylsvxSLpy+p'
        ),
    ));

    $response =  curl_exec($curl);

    $amsResponse = (array) json_decode($response);

    if (count($amsResponse) > 0) {
        foreach ($amsResponse['results'][0]->results as $record) {
            $recordArr = (array) $record;
            $filterUsers[] = $recordArr['uuid'];
        }
    }
    return $filterUsers;
}

function getPages()
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://127.0.0.1/artemis/api/resource/v1/person/personList',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "pageNo":   1,
        "pageSize": 100
    }',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/json;charset=UTF-8',
            'X-Ca-Key: 21552964',
            'X-Ca-Signature:  7+xw/az9tzvECaEKOO2mng0KqhpV8CzSquoijfO2+MI='
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $getPages = (array) json_decode($response);
    //var_dump($getPages);
    $totalRecords = $getPages['data']->total;
    echo "Total Records" . $totalRecords;
    $pages = (int) ($totalRecords / 100) + 1;
    return $pages;
}

function getUsersList($page)
{
    global $myfileUsers;
    $curl = curl_init();
    echo "Page $page <br />";

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://127.0.0.1/artemis/api/resource/v1/person/personList',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "pageNo":   ' . $page . ',
        "pageSize": 100
    }',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/json;charset=UTF-8',
            'X-Ca-Key: 21552964',
            'X-Ca-Signature:  7+xw/az9tzvECaEKOO2mng0KqhpV8CzSquoijfO2+MI='
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $getPages = (array) json_decode($response);
    $allRecords = (array) $getPages['data']->list;

    $userRecords = [];

    foreach ($allRecords as $row) {
        if ($row->orgIndexCode == 10 || $row->orgIndexCode == 9) {
            $userRecords[] = (array) $row;
        }
    }
    //var_dump($userRecords);
    if (count($userRecords) > 0) return $userRecords;
}

function updateUser($personId)
{
    $curl = curl_init();

    $dateNow = date("Y-m-d");

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://127.0.0.1/artemis/api/resource/v1/person/single/update',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "personId": "' . $personId . '",
        "beginTime": "' . $dateNow . 'T00:00:00+08:00",
        "endTime": "' . $dateNow . 'T23:59:59+08:00"
    }',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/json;charset=UTF-8',
            'X-Ca-Key: 21552964',
            'X-Ca-Signature: xFk7W8P4PLGFgIevxF3IGTUAKu40DEGsq8SFCOL3Adg='
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    var_dump($response);
}

function updateDevices()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://127.0.0.1/artemis/api/visitor/v1/auth/reapplication',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{}',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/json;charset=UTF-8',
            'X-Ca-Key: 21552964',
            'X-Ca-Signature: WXC1LaYR1LF7+onNaIWN7FMFHUVDoxW5B7laIiMZaS8='
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    var_dump($response);
}

function updateDashboard($userName, $amsUUID, $lastUpdate)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://vis.unified-bi.org/facialrecognition/amsUpdates.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
    "userName": ' . '"' . $userName . '"' . ',
    "amsUUID": ' . $amsUUID . ',
    "amsLastUpdate": ' . '"' . $lastUpdate . '"' . '
    }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}

function getAmsRecord($personName, $personId, $amsUUID)
{

    $curl = curl_init();
    global $myfile;


    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ams.ausport.gov.au/vis/api/v1/eventsearch?informat=json&format=json',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "formNames": [
            "COVID-19 Tracking"
        ],
        "userIds": [
            ' . $amsUUID . '
        ],
        "resultsPerUser": 1
    }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json; charset=UTF-8',
            'Authorization: Basic dW5pZmllZC5jb25uZWN0b3I6TmxFbHFHNE43NSEj',
            'Cookie: JSESSIONID=HvGqSvUuOR4GU-ioXHF2cM0W'
        ),
    ));

    $response =  curl_exec($curl);

    $amsResponse = (array) json_decode($response);

    var_dump($response);
    $txt = json_encode(["response" => $amsResponse, "uuid" => $amsUUID]);
    fwrite($myfile, $txt);
    if (count($amsResponse) > 0) {


        $eventData = (array) $amsResponse['events'][0];
        $dateArr = explode("/", $eventData['finishDate']);
        $newdate = $dateArr[2] . "-" . $dateArr[1] . "-" . $dateArr[0];
        $eventDate = date("Y-m-d", strtotime($newdate));
        echo "eventDATE" . $eventDate . "<br />";
        updateDashboard($personName, $amsUUID, $eventDate);
        if ($eventDate > date("Y-m-d")) {
            return "update";
        }
    }
    return "no record";
    curl_close($curl);
}

function getAmsRecords($amsUUIDs)
{

    $curl = curl_init();
    global $myfile;

    $uuidsArr = array_column($amsUUIDs, "uuid");
    $stringUUIDs = implode(",", $uuidsArr);

    echo "stringUUIDs<br />";
    var_dump($stringUUIDs);

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ams.ausport.gov.au/vis/api/v1/eventsearch?informat=json&format=json',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "formNames": [
            "COVID-19 Tracking"
        ],
        "userIds":[ 
            ' . $stringUUIDs . '
        ],
        "resultsPerUser": 1
    }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json; charset=UTF-8',
            'Authorization: Basic dW5pZmllZC5jb25uZWN0b3I6TmxFbHFHNE43NSEj',
            'Cookie: JSESSIONID=HvGqSvUuOR4GU-ioXHF2cM0W'
        ),
    ));

    $response =  curl_exec($curl);

    $amsResponseArr = (array) json_decode($response);

    //var_dump($amsResponseArr);
    $txt = json_encode(["response" => $amsResponseArr]);
    fwrite($myfile, $txt);
    if (count($amsResponseArr) > 0) {

        $amsResponseEvents = $amsResponseArr['events'];
        foreach ($amsResponseEvents as $eventData) {

            $eventData = (array) $eventData;
            $dateArr = explode("/", $eventData['finishDate']);
            $newdate = $dateArr[2] . "-" . $dateArr[1] . "-" . $dateArr[0];
            $eventDate = date("Y-m-d", strtotime($newdate));
            echo "eventDATE----" . $eventDate . "<br />";
            $rows = (array) $eventData['rows'][0];
            $pairs = (array) $rows['pairs'][0];
            $personName = $pairs['value'];
            $amsUUID = $eventData['userId'];


            if ($eventDate >= date("Y-m-d")) {
				echo "<br />lets match UUID and update user profile</br >";
                //return "update";
                foreach ($amsUUIDs as $uuidslist) {
                    if ($uuidslist['uuid'] == $amsUUID) {

                        updateUser($uuidslist['personId']);
                        updateDashboard($personName, $amsUUID, $eventDate);
                    }
                }
            }
        }
    }
    fclose($myfile);

    //return "no record";
    curl_close($curl);
}

function mainServiceRun()
{
    global $myfileUsers;
    $filterUsers = getAMSUSers();

    $pages = getPages();

    $athleteUsers = [];

    for ($i = 1; $i <= $pages; $i++) {
        $response = (array) getUsersList($i);
        foreach ($response as $row) {
            $athleteUsers[] = $row;
        }
    }

    $txt = json_encode($athleteUsers);
    fwrite($myfileUsers, $txt);

    fclose($myfileUsers);

    //var_dump($athleteUsers);
    $today = date("Y-m-d 23:59:59");
    $userUUIDs = [];
    foreach ($athleteUsers as $row) {
        echo "Start************************************************************************************************************";
        $customFields = (array) $row['customFieldList'][0];

        $endTimeArr = explode("T", $row['endTime']);
        $endTime = date("Y-m-d H:i:s", strtotime($endTimeArr[0]));
        $eventDate = date("Y-m-d", strtotime($endTimeArr[0]));
        echo "*********<br /> today--" . $today . "<br />";

        echo "*********<br /> endtime--" . $endTime . "<br />";
        var_dump($row['personName']);
        var_dump($row['personId']);
        var_dump($customFields);
        echo "<br />";



        if ($customFields['customFiledName'] == "AMS__UUID" && $customFields['customFieldValue'] != "" && $endTime < $today) {
            //echo $customFields['customFieldValue'];
            echo "Requires Update ####################### <br />";
            //var_dump($filterUsers);
            $amsUUID = $customFields['customFieldValue'];
            if (in_array($amsUUID, $filterUsers)) {

                $userUUIDs[] = ["uuid" => (int) $customFields['customFieldValue'], "personId" => $row['personId']];

            }
        }
        echo "End************************************************************************************************************";

    }
    //lets run one ams query for all uuids
    if (count($userUUIDs) > 0) {

        getAmsRecords($userUUIDs);
        $myfileUsers = fopen("athletes.txt", "w") or die("Unable to open file!");

        $txt = json_encode(["outdatedAthletes" => $userUUIDs]);
        fwrite($myfileUsers, $txt);
    }

    updateDevices();


    echo date("Y-m-d H:i:s");

    sleep(60);
    mainServiceRun();

    //echo "<script>window.close();</script>";

}

mainServiceRun();


