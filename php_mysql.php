<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        define("DB_SERVERNAME", "localhost:8889");
        define("DB_USERNAME","root");
        define("DB_PASSWORD", "root");
        define("DB_NAME", "db_university");

        $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if($conn && $conn -> connect_error){
            echo('Connection Failed');
            die();
        }

        echo('Connection OK!');

        $sql = 'SELECT `name`, `surname`, `email` FROM `students`';

        $result = $conn -> query($sql);
    
        if($result && $result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                
            }
        }

    ?>

</body>
</html>

