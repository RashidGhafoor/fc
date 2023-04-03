<?php
// Dao: Data Access Object
// Class for interacting with the data base: getting connecting and retreiving
// and saving data.

class Dao {
    private $host = "localhost";
    private $db = "fc";
    private $user = "root";
    private $pass = "";

    public function getConnection () {
        return 
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
        $this->pass);
    }

    public function saveComment($post_id, $comment){
        $conn = $this->getConnection();

        $sql = "INSERT INTO comments (post_id, comment) 
                VALUES (:post_id, :comment)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':comment', $comment);

        $stmt->execute();
        return true;
    }

    public function savePost ($event_name, $event_date, $event_location, $event_description) {

        $conn = $this->getConnection();

        $sql = "INSERT INTO events (event_name, event_date, event_location, event_description) 
                VALUES (:event_name, :event_date, :event_location, :event_description)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':event_name', $event_name);
        $stmt->bindParam(':event_date', $event_date);
        $stmt->bindParam(':event_location', $event_location);
        $stmt->bindParam(':event_description', $event_description);

        $stmt->execute();
    
        return true;
    }

    public function deletePost ($id) {
        $conn = $this->getConnection();
        
        $sql = "DELETE FROM events WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    public function getPost ($id) {
        $conn = $this->getConnection();

        $sql = "SELECT * FROM events WHERE id = :id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPosts () {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM events")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostComments ($post_id) {
        $conn = $this->getConnection();
        
        $sql = "SELECT * FROM comments WHERE post_id = :post_id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':post_id', $post_id);

        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}