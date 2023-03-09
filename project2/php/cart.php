<html>
    <head>

    </head>
    <body>
        <div class='topbar'>

        </div>

        <div class='sidebar'>

        </div>

        <div class='main'>
            <?php

            session_start();
            if ($_SESSION["logged_in"] != true) {
                echo "alert('not logged in')";
            }

            $items = $_SESSION["cart"];
            foreach ($items as $item) {
                var_export($item);
            }
            
            echo '<h2 class="cart_title"> Items in cart: </h2>';
            echo '<div class="cart_table_container">';
            echo '<table>';
            echo "<tr>";
            echo "<th>name</th>";
            echo "<th>unit price</th>";
            echo "<th>quantity</th>";
            echo "<th>price</th>";
            echo "</tr>";
            $total = 0;
            foreach ($items as $item) {
                echo '<tr> ' . $item["name"] . ' </tr>';
                echo '<tr> x' . $item["price"] . ' </tr>';
                echo '<tr> ' . $item["quantity"] . ' </tr>';
                echo '<tr> ' . $item["price"] * $item["quantity"] . ' </tr>';
                $total += $item["price"] * $item["quantity"];
            }
            echo '</table> </div>';
            echo '<div class="cart_total">
                 <p> ' . $total . ' </p> </div>';
            ?>
    </body>
</html>