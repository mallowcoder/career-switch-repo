<?php
    $session_id = $_REQUEST['session_id'];
    
    $cart_id = $_REQUEST['cart_id'];
    
    $order_id = $_REQUEST['order_id'];
    
    $user_name = $_REQUEST['user_name'];
    
    $user_email = $_REQUEST['user_email'];
    
    $user_address = $_REQUEST['user_address'];

    
    $link = mysqli_connect("localhost", "root", "mallowdb", "phpshop");
    $sql = "select * from cart where id=\"" . $cart_id."\";";     
    
    $result = mysqli_query($link, $sql);
    $total = 0;
    
    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_array($result)){
            $total += ($row["item_price"] * $row["quantity"]);
        }
    }

    $sql = "insert into orders values(\"".$order_id."\",\"".$cart_id."\", \"".$user_email."\", \"".$user_address."\",".$total.", \"".date("Y-m-d H:i:s")."\");";
    $result = mysqli_query($link, $sql);

    mysqli_close($link);

    $output['status']['code'] = "200";
    $output['status']['name'] = "ok";
    $output['status']['description'] = "success";
    $output['data']['order_id'] = $order_id;
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($output); 
?>