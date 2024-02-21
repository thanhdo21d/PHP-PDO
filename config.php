<?php
$conn = mysqli_connect("localhost", "root", "", "x-shop-asm");
mysqli_set_charset($conn,"utf8");


function fetch_array($con,$query) {
     return mysqli_fetch_array(mysqli_query($con,$query));
}
function fetch_assoc($query) {
     return mysqli_fetch_assoc($query);
}
?>