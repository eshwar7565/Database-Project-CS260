<!-- 
<?php


// Check if the form has been submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

   

    // $name = $_POST["name"];
    // $email = $_POST["email"];
    // $resume = $_FILES["resume"]["name"];

    // // Upload the student's resume to the server
    // $target_dir = "resumes/";
    // $target_file = $target_dir . basename($_FILES["resume"]["name"]);

    // if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
        // Insert the student's application into the database
    
    // } else {
        // echo "Sorry, there was an error uploading your file.";
    // }
// }

// mysqli_close($conn);
// ?> -->

 <?php
    //Connect to MySQL server 
    require 'config.php';
    session_start();
   
    
    
    //If there is no session user, then redirect to login page 
    if (!isset($_SESSION['sess_user'])) {
        header("location: login.php");
    }
    $emp_id = $_SESSION['sess_user'];

   
    if (isset($_GET["id"])) {
        $roll = $_GET["id"];
    } else {
        die(" ID not specified.");
    }

    //Find various fields for an  and save them in variables for display purposes 
    
    $query = "select * from recruitment where rollno='$roll'";
    $result = mysqli_query($conn, $query);
    $sql1="select salary into @salary from companydetails where compname='$emp_id'";
    
    mysqli_query($conn,$sql1);
    $query2="select @salary";
    $result2=mysqli_query($conn,$query2);
    $row=mysqli_fetch_assoc($result2);
    $salary=$row['@salary'];

    if(mysqli_num_rows($result)==0)
    {
    $sql = "INSERT INTO recruitment (rollno, compname, salary) VALUES ('$roll', '$emp_id', @salary)";
    mysqli_query($conn, $sql);
    $sql = "update sd set salary='$salary' where rollno='$roll'";
    mysqli_query($conn,$sql);
      echo "Successfully accepted";
      header("Location: main.php");

    }else
    {
        $sql2="select salary into @ssalary from sd where '$roll'=rollno";
        mysqli_query($conn,$sql2);
        $query2="select @ssalary";
        $result2=mysqli_query($conn,$query2);
        $row=mysqli_fetch_assoc($result2);
        $ssalary=$row['@ssalary'];
        
        if($salary>$ssalary){
            $sql3="update recruitment set salary='$salary' where rollno='$roll'";
            $sql4="update recruitment set compname='$emp_id' where rollno='$roll'";
            $sql = "update sd set salary='$salary' where rollno='$roll'";
            mysqli_query($conn,$sql3);
            mysqli_query($conn,$sql4);
            mysqli_query($conn,$sql);
            echo "Successfully accepted";
            header("Location: main.php");
        }
        else{
            echo "Student is not interested sorry.";
        }
       
    }

    $sql="delete from apply where '$roll'=rollno and '$emp_id'=compname";
    mysqli_query($conn,$sql);

    

    ?>

<!DOCTYPE html>
<html>
<head>
<style>
      .centered-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
    </style>
</head>
<body>
<form method="get" action="main.php">
		
        <button class="centered-button">Go back</button>

	</form>
  
	
</body>
</html>