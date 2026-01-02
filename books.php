<?php

require'connection.php';

$sql="create table books(
  book_id int(6) primary key,
  title varchar(50),
  author varchar(100)
)";

if(mysqli_query($conn,$sql)){
   echo" book table  create seccussfully !";
}else{
    die("book table  create failed!".mysqli_error($conn));
}
?>