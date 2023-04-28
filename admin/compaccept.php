

<?php
    //Connect to MySQL server 
    require 'config.php';
   

   
    if (isset($_GET["id"])) {
        $roll = $_GET["id"];
    } else {
        die(" ID not specified.");
    }
   

    $sql="update companyregister set isverified='YES' where '$roll'=compname";
    mysqli_query($conn,$sql);
    Header("Location: verifycomp.php");

    ?>