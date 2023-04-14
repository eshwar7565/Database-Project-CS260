<?php

class BlobDemo {

    const DB_HOST = 'localhost';
    const DB_NAME = 'project';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    /**
     * PDO instance
     * @var PDO 
     */
    private $pdo = null;

    /**
     * Open the database connection
     */
    public function __construct() {
        // open database connection
        $conStr = sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::DB_HOST, self::DB_NAME);

        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
            //for prior PHP 5.3.6
            //$conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * select data from the files
     * @param int $id
     * @return array contains mime type and BLOB data
     */
    public function selectBlob($id) {

        $sql = "SELECT resume FROM sd WHERE rollno = :id;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":id" => $id));
        $stmt->bindColumn(1, $resume, PDO::PARAM_LOB);

        $stmt->fetch(PDO::FETCH_BOUND);

        return $resume;
    }

    /**
     * close the database connection
     */
    public function __destruct() {
        // close the database connection
        $this->pdo = null;
    }

}

// Check if the rollno parameter is provided in the URL
if(isset($_GET["id"])) {
    $rollno = $_GET["id"];
    
    // connect to the database
    require_once 'config.php';
    $blobObj = new BlobDemo();
    
    // retrieve the file associated with the rollno
    $resume = $blobObj->selectBlob($rollno);
    
    // set the content type header to display PDF file
    header("Content-Type: application/pdf");
    
    // output the file data
    echo $resume;
} else {
    header("Location: main.php");
}

?>
