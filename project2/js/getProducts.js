$(document).ready( function ()  {
    $.ajax({
        url: "./php/getProducts.php",
        type: 'GET',
        dataType: 'json',
        data: {
            session_id: getCookie("session_id"),
        },
        success: function (result) {
            console.log("getting results")
            console.log(JSON.stringify(result));
            console.log(JSON.stringify(result.data[0]));
            var tbl = document.getElementById("shop_table")
            for (row of result.data) {
                var r = tbl.insertRow()

                // id
                var id_td = r.insertCell()
                id_td.appendChild(document.createTextNode(row["id"]))
                id_td.id="shop_id_cell"
                id_td.className = "d-table-cell text-white align-items-center td-fit"
                
                
                // name
                var name_td = r.insertCell()
                name_td.className = "d-table-cell text-white align-items-center td-fit"
                name_td.id="shop_name_cell"
                name_td.appendChild(document.createTextNode(row["name"]))
                

                // price
                price_td = r.insertCell()
                price_td.className = "d-table-cell text-white align-items-center td-fit"
                price_td.id="shop_price_cell"
                price_td.appendChild(document.createTextNode(row["price"]))
                

                // thumbnail
                var img_td = r.insertCell()
                var img = new Image();
                img.src = "./"+row["thumbnail"];
                img.id="featuredImg"
                img.onclick = function() {
                    window.location.href = 'product_page.html?id='+row["id"];
                };
                img_td.id="shop_img_cell"
                img_td.appendChild(img);

                
                
            }
        }
    })
});