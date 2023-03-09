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

                $id = $_GET['id'];
                $link = mysqli_connect("localhost", "root", "mallowdb", "phpshop");
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                $sql = 'select * from products where id='.$id;
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_array($result);
                        echo '<h2 class="product_title">' . $row['name'] . '</h2>';
                        echo '<div class="product_image">';
                        echo '<span><img src="./' . $row["thumbnail"] . '" alt="No image available" /></span>';
                        echo '</div>';
                        echo '<div class="product_description">' . $row['description'] . '</div>';
                        echo '<div class="product_price"> <p>' . $row['price'] . '</p></div>';
                        echo '<div class="product_add">' . '<button class="addToCart" onCLick=addToCart.php> Add to Basket </button>';
                        mysqli_free_result($result);
                    }  else {
                        echo "No records matching your query were found.";
                    }
                }
                mysqli_close($link);
            ?>
        </div>

    </body>
</html>