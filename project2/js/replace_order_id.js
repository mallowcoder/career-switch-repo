$(document).ready( function ()  {
   $("#order_id").text($.urlParam("order"))

   eraseCookie("cart_id")
   eraseCookie("session_id")
   eraseCookie("order_id")
});