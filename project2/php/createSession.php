<?php
    $session_id = $_REQUEST['session_id'];
    $cart_id = $_REQUEST['cart_id'];

    $link = mysqli_connect("localhost", "root", "mallowdb", "phpshop");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "insert into sessions values(\"".$session_id."\",\"".$cart_id."\",null);";
    $res = mysqli_query($link, $sql);
    
    mysqli_close($link);
    $output = "ok";
    echo json_encode($output); 
?>