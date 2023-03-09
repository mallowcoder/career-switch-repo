<html>
    <head>

    </head>
    <body>
        <?php

        session_start();
        if ($_SESSION["logged_in"] != true) {
            echo "alert('not logged in')";
        }
            $link = mysqli_connect("localhost", "root", "mallowdb", "phpshop");
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            // Print host information
            echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);

            $sql = "select * from products";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>id</th>";
                    echo "<th>name</th>";
                    echo "<th>price</th>";
                    echo "<th>thumbnail</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . '
                            <a href="./product.php?id='.$row["id"].'" >
                            <img class="productImage" src="./' . $row["thumbnail"] . '" alt="no image available" /> </a> </td>';
                        echo '<td>' . 
                        '<form method="post"class="products_table_add" action="./addToCart.php">
                        <input type="hidden" name="id" value="'. $row["id"] . '" >
                        <input type="hidden" name="quantity" value="1" >
                        <input type="submit" class="addToCart" value="Add to Cart">';
                        echo "</tr>";
                    }
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else {
                    echo "No records matching your query were found.";
                }
            }

            mysqli_close($link);
        ?>
    </body>
</html>