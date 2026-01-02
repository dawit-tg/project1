<?php
$conn=mysqli_connect("localhost","root","" ,"DLMS");
if($conn){
 //echo"connection seccussfully!!";
}else{
    die("connection failed!!".mysqli_error($conn));
}

?>