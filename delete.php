<?php
if(!isset($_GET["id"])){
   $id=$_GET["id"];

   $servername="localhost";
    $username="root";
    $password="";
    $database="project1";
    $connection=new mysqli($servername,$username,$password,$database);

    $sql="DELETE FROM Customer3 WHERE id=$id";
    $connection->query($sql);
}

header("location : /PROJECT1/Index.php");
exit;


?>