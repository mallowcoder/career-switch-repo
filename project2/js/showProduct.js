$(document).ready( function ()  {
    $.ajax({
        url: "./php/getProductByID.php",
        type: 'GET',
        dataType: 'json',
        data: {
            session_id: sessionStorage.getItem("session_id"),
            id: $.urlParam("id")
        },
        success: function (result) {
            console.log("getting results")
            console.log(JSON.stringify(result));
            $("#name").text(result["data"]["name"])
            $("#description").text(result["data"]["description"])
            $("#price").text("£" + result["data"]["price"])
            $("#main_product_image").attr('src', "./" + result["data"]["thumbnail"])
        }
    })
});
