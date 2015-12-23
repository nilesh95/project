<?php
 
class DB_Functions {
 
    private $db;
 
    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $gcm_regid) {
        // insert user into database
$c=new DB_Connect();
	$d=$c->connect();
        $test= mysqli_query($d,"SELECT * class_details where code='$email'");
        if($test)
        {
        $result = mysqli_query($d,"INSERT INTO gcm_users(name, email, gcm_regid, created_at) VALUES('$name', '$email', '$gcm_regid', NOW())");
        // check for successful store
        if ($result) {
            // get user details
            $id = mysqli_insert_id(); // last inserted id
            $result = mysqli_query($d,"SELECT * FROM gcm_users WHERE id = $id") or die(mysql_error());
            // return user details
            if (mysqli_num_rows($result) > 0) {
                return mysqli_fetch_array($result);
            } else {
                return false;
            }
        } else {
            return false;
        }
     }
else {
            return false;
        }
    }
 
    /**
     * Getting all users
     */
    public function getAllUsers() {
	$c=new DB_Connect();
	$d=$c->connect();
        $result = mysqli_query($d,"select * FROM gcm_users");
        return $result;
    }
	
 
}
 
?>	