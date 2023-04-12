<?php
session_start();
if (!isset($_SESSION['sess_user'])) {
    header("location: login.php");
}
$emp_id = $_SESSION['sess_user'];
if (isset($_POST['submit']) && !empty($_FILES['pdf_file']['name'])) {
    if ($_FILES['pdf_file']['error'] != 0) {
        echo 'Something wrong with the file.';
    } 
    else { 
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        if ($pdf_blob = fopen($file_tmp, "rb")) {
            try{
                include __DIR__."/databasecon.php";
                $insert_sql = "update sd set resume=:pdf_doc where '$emp_id'=rollno;";
                $stmt = $pdo->prepare($insert_sql);
                $stmt->bindParam(':pdf_doc', $pdf_blob, PDO::PARAM_LOB);
                if ($stmt->execute() === FALSE) {
                    echo 'Could not save information to the database';
                } 
                else {
                    echo 'Information saved';
                }
            } 
            catch (PDOException $e) {
            echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().': '. $e->getLine(); 
            }
        } 
        else{
        echo 'Could not open the attached pdf file';
        }
    }
}
else {
    header('Location: choose_file.php');
}
?>