//todo
function placeOrder() {
    $.ajax({
        url: "./php/placeOrder.php",
        type: 'GET',
        dataType: 'json',
        data: {
            session_id: getCookie("session_id"),
            cart_id: getCookie("cart_id"),
            order_id: crypto.randomUUID(),
            user_name: $("#name").val(),
            user_email: $("#email").val(),
            user_address: $("#address").val()
        },
        success: function (result) {
            console.log(JSON.stringify(result))
            if(result["status"]["name"] = "ok") {
                setCookie("order_id", result["data"]["order_id"], 1)
                window.location.replace("order_confirmation.html?order="+result["data"]["order_id"]);
            }
            else {
                alert("Something went wrong. Try again!")
            }
        }
    })
}