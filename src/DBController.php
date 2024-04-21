<?php
    namespace App;

use App\Article as AppArticle;
use PDOException;
    use Article;
    use PDO;
    class DBController{
        public function connect(){
            try {
        
                $connect = new PDO(
        "mysql:host=".$_ENV["DB_HOST"].";dbname=".$_ENV["DB_DB"]."", $_ENV["DB_USER"]);
            }
        catch (PDOException $e) {
                echo "Error : " . $e->getMessage() . "<br/>";
                die();
            }
            return $connect;
        }
        public function find(string $name_id){
            try {
                // Prepare an SQL statement
                $stmt = $this->connect()->prepare("SELECT * FROM `article` WHERE `name_id` = :name_id");
            
                // Bind parameters to the SQL query
                $stmt->bindParam(':name_id', $name_id);
            
                // Execute the query
                $stmt->execute();
            
                // Fetch the result
                $res = $stmt->fetch(PDO::FETCH_ASSOC);
            
                // Output the result
                
                var_dump($res);
                return $res;
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
        }

        public function insert(AppArticle $article){
            try {
                // Prepare an SQL statement
                $stmt = $this->connect()->prepare("INSERT INTO `article` (`name`, `main_text`, `name_id`) VALUES (:name, :main_text, :name_id)");
            
                // Bind parameters to the SQL query
                $stmt->bindParam(':name', $article->name);
                $stmt->bindParam(':main_text', $article->main_text);
                $stmt->bindParam(':name_id', $article->name_id);
            
                // Execute the query
                $res = $stmt->execute();
            
                // Output the result
                return $res;
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
        }

    }
    
   
?>