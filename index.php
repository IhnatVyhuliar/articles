<?php
    
    require __DIR__ . '/vendor/autoload.php';
    use App\DBController;   
    use App\Article;
    use FILTER_SANITIZE_STRING;
    Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '')->load();
    
    $dbcontroller=new DBController();
    var_dump($dbcontroller->connect());
    
    $method=$_SERVER["REQUEST_METHOD"];
    if ($method=="GET"){
        if (isset($_GET["name_id"])){
            $name_id = filter_var($_GET["name_id"], 
                FILTER_SANITIZE_STRING);
            return json_encode($dbcontroller->find($_GET["name_id"]));
        }
        
    }
    else{
        header('HTTP/1.0 405 Method not allowed');
        echo "METHOD NOT ALLOWED";
    }
?>