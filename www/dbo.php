
<?php

class Dao {

  private $host = 'us-cdbr-iron-east-05.cleardb.net';
  private $dbname = 'heroku_f5f174a4827f380';
  private $username = 'b8fbc5b0f01b40';
  private $password = 'c5867c35';

  public function getConnection() {
    try {
       $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
	   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   echo "Connected successfully"; 
	   
    } catch (Exception $e) {
      echo print_r($e,1);
    }
    return $connection;
  }


  public function getComments() {
    $conn = $this->getConnection();
    try {
    return $conn->query("select comment_id, comment, date_entered  from comment order by date_entered asc", PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;

    }
  }

  public function saveComment ($comment) {
    $conn = $this->getConnection();
    $saveQuery = "insert into comment (comment) values (:comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function deleteComment ($id) {
    $conn = $this->getConnection();
    $deleteQuery = "delete from comment where comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }
  public function getConnectionStatus(){
		$conn = $this->getConnection();
		return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	}

}
