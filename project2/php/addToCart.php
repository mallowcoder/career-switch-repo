<?php
    $session_id = $_REQUEST['session_id'];
    
    $cart_id = $_REQUEST['cart_id'];
    

    $item = $_REQUEST['item_id'];
    $qt = $_REQUEST['qt'];    
    
    $link = mysqli_connect("localhost", "root", "mallowdb", "phpshop");
    $sql = 'select * from products where id=' . $item.";";     


    $result = mysqli_query($link, $sql);
    $cart_item = array();

    if (mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_array($result);
        $cart_item["id"] = $item;
        
        $cart_item["name"] = $row["name"];
        $cart_item["price"] = $row["price"];
        $cart_item["quantity"] = $qt;
    }

    //check if in cart
    $sql = "select * from cart where id=\"".$cart_id."\" and item_id=".$item;
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        
        // update quantity
        $row = mysqli_fetch_array($result);
        
        $new_qt = $row["quantity"] + $qt;
        
        $updateQuery = "update cart set quantity=".$new_qt." where id=\"".$cart_id."\" and item_id=\"".$item."\";";
         
        $updateResult = mysqli_query($link, $updateQuery);
    } else {
        $insert_sql = "insert into cart values (\"".$cart_id.
        "\", ".$cart_item["id"].", \"". 
        $cart_item["name"]."\", ".
        $cart_item["price"].", ".
        $cart_item["quantity"].");";
        $res = mysqli_query($link, $insert_sql);
        
    }
    mysqli_close($link);

    $output['status']['code'] = "200";
    $output['status']['name'] = "ok";
    $output['status']['description'] = "success";
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($output); 
?>