<?php
require 'config.php';
require 'config.php';
session_start();
$emp_id = $_SESSION['sess_user'];


//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
	header("location: login.php");
}
?>



<!DOCTYPE html>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="main.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="eligcomp.php">Apply For Job</a>
      </li>
      
      
    </ul>
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" onclick=logout() >Logout</a>
      </li>
    </ul>
  </div>
</nav>
<script>
function logout() {
  if (window.confirm("Are you sure you want to log out?")) {
    // Send request to server to invalidate session and log out user
    // ...
    alert("You have been logged out."); // Display a message to the user
    window.location.href = "logout.php"; // Redirect the user to the login page
  }
}
</script>

</html>
<!DOCTYPE html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>

 <title>Student Dashboard</title>
 </html>
<?php

class BlobDemo {

    const DB_HOST = 'localhost';
    const DB_NAME = 'project';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    private $pdo = null;

    public function __construct() {
        $conStr = sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::DB_HOST, self::DB_NAME);

        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateBlob($id, $filePath, $mime) {
        $blob = fopen($filePath, 'rb');

        $sql = "UPDATE sd SET resume = :resume, mime = :mime WHERE rollno = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':resume', $blob, PDO::PARAM_LOB);
        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function __destruct() {
        $this->pdo = null;
    }

}

if(isset($_POST['submit'])) {
    $id = $emp_id;
    $file = $_FILES['resume'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = array('pdf');

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $blobObj = new BlobDemo();
                $filePath = $fileTmpName;
                $mime = mime_content_type($filePath);
                $result = $blobObj->updateBlob($id, $filePath, $mime);
                if($result) {
                    echo "Resume uploaded successfully.";
                } else {
                    echo "Resume upload failed, please try again.";
                }
            } else {
                echo "Your file is too large.";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "You cannot upload files of this type.";
    }
}

if(isset($_POST['view'])) {
    $id = $emp_id;
    $blobObj = new BlobDemo();
    $pdo = $blobObj->getPdo();

    $sql = "SELECT resume, mime FROM sd WHERE rollno = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->bindColumn(1, $data, PDO::PARAM_LOB);
    $stmt->bindColumn(2, $mime);
    $stmt->fetch(PDO::FETCH_BOUND);

    header("Content-Type: {$mime}");
    readfile($data);
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Resume</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="id">Enter your rollno:</label>
        <input type="text" id="id" name="id"><br><br>
        <input type="file" name="resume"><br><br>
        <button type="submit" name="submit">Upload</button>
    </form>
    <br>
    <h1>Click to view resume:</h1>
    <form method="post">
        <button type="submit" name="view">View</button>
    </form>
</body>
</html>

