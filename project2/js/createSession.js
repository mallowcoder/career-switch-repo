$(document).ready( function ()  {
    if (!getCookie("session_id")) {

        let session_id = crypto.randomUUID()
        let cart_id = crypto.randomUUID()
        if ($.urlParam("user_email")) {
            setCookie("user_email", $.urlParam("user_email"), 30)
        }
        console.log(session_id);
        $.ajax({
            url: "./php/createSession.php",
            type: 'GET',
            dataType: 'json',
            data: {
                session_id: session_id,
                cart_id: cart_id
            },
            success: function (result) {
                console.log(JSON.stringify(result));
                setCookie("session_id", session_id, 1)
                setCookie("cart_id", cart_id)
            }
        })
    }
});