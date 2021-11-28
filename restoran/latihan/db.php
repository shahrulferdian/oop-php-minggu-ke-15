<?php 

class DB{

    //properti
    public $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $database = "dbrestoran";

    public function __construct(){
        echo 'funtion construck';
    }

    //method
    public function selectdata(){
        echo 'select data';
    }

    public function getDatabase(){
        echo $this->database;
    }

    public static function insertData()
    {
        echo 'static';
    }
}

DB::insertData();
echo '<br>';
$db = new DB;

// $db->selectdata();
// echo '<br>';
// echo $db->host;
// echo '<br>';
// $db->getDatabase();

?>