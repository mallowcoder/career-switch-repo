$(document).ready( function ()  {
    $.ajax({
        url: "./php/getCart.php",
        type: 'GET',
        dataType: 'json',
        data: {
            session_id: getCookie("session_id"),
            cart_id: getCookie("cart_id")
        },
        success: function (result) {
            console.log("getting results")
            console.log(JSON.stringify(result));
            console.log(JSON.stringify(result.data[0]));
            var tbl = document.getElementById("cart_table")
            for (row of result.data) {
                var r = tbl.insertRow()

                // id
                var id_td = r.insertCell()
                id_td.appendChild(document.createTextNode(row["item_id"]))
                id_td.className = "d-table-cell text-white align-items-center td-fit"
                
                
                // name
                var name_td = r.insertCell()
                name_td.className = "d-table-cell text-white align-items-center td-fit"
                name_td.id="shop_name_cell"
                name_td.appendChild(document.createTextNode(row["item_name"]))
                

                // price
                price_td = r.insertCell()
                price_td.className = "d-table-cell text-white align-items-center td-fit"
                price_td.id="shop_price_cell"
                price_td.appendChild(document.createTextNode(row["item_price"]))
                

                 // quantity
                qt_td = r.insertCell()
                qt_td.className = "d-table-cell text-white align-items-center td-fit"
                qt_td.appendChild(document.createTextNode(row["quantity"]))
                
            }
        }
    })
});