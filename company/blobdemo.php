<?php
    //Connect to MySQL server 
    require 'config.php';
    session_start();
   

   
    if (isset($_GET["id"])) {
        $roll = $_GET["id"];
    } else {
        die(" ID not specified.");
    }



class BobDemo {

    const DB_HOST = 'localhost:3308';
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
     * select data from the the files
     * @param varchar $id
     * @return array contains mime type and BLOB data
     */
    public function selectBlob($id) {
        $sql = "SELECT resume FROM files WHERE id = rollno;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":id" => $id));
        $stmt->bindColumn(1, $resume, PDO::PARAM_LOB);

        $stmt->fetch(PDO::FETCH_BOUND);

        return array(
            "data" => $resume);
    }

    /**
     * close the database connection
     */
    public function __destruct() {
        // close the database connection
        $this->pdo = null;
    }

}

$blobObj = new BobDemo();


$a = $blobObj->selectBlob($roll);
header("Content-Type:" . $roll);
echo $a['resume'];