<?php
    $session_id = $_REQUEST['session_id'];

    $link = mysqli_connect("localhost", "root", "mallowdb", "phpshop");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "select * from products";
    $result = mysqli_query($link, $sql);
    $ret = array();
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result) ) {
                array_push($ret, $row);
                continue;
            }
        }
        mysqli_free_result($result);
    }
    mysqli_close($link);

    $output['status']['code'] = "200";
    $output['status']['name'] = "ok";
    $output['status']['description'] = "success";
	$output['data'] = $ret;
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($output); 
?>