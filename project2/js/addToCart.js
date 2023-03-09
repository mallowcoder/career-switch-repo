$(document).ready( function ()  {
    $('#addToCart').click(() => {
        $.ajax({
            url: "./php/addToCart.php",
            type: 'GET',
            dataType: 'json',
            data: {
                session_id: getCookie("session_id"),
                cart_id: getCookie("cart_id"),
                item_id: $.urlParam("id"),
                qt: $("#quantity").val()
            },
            success: function (result) {
                console.log("anything")
                console.log(JSON.stringify(result));
            }
        })
    })
});