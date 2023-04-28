

<?php
    //Connect to MySQL server 
    require 'config.php';
   

   
    if (isset($_GET["id"])) {
        $roll = $_GET["id"];
    } else {
        die(" ID not specified.");
    }
   

    $sql="delete from alumnir where '$roll'=rollno";
    mysqli_query($conn,$sql);
    Header("Location: verifyalum.php");

    ?>