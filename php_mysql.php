<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP MYSQL</title>
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

        $sql = 'SELECT `students`.`surname`, `students`.`name`, `degrees`.`name` AS `degree_name`, `departments`.`name` AS `department_name` FROM `students` JOIN `degrees` ON `students`.`degree_id` = `degrees`.`id` JOIN `departments` ON `degrees`.`department_id` = `departments`.`id` GROUP BY `students`.`surname`, `students`.`name`, `degrees`.`name`, `departments`.`name` LIMIT 100';

        $result = $conn -> query($sql);
    
        if($result && $result -> num_rows > 0){

            ?>
                    <div class="row">
                        <div class="col-2 text-center"><h4>SURNAME</h4></div>
                        <div class="col-2 text-center"><h4>NAME</h4></div>
                        <div class="col text-center"><h4>CORSO DI LAUREA</h4></div>
                        <div class="col text-center"><h4>DIPARTIMENTO</h4></div>
                    </div>
            <?php

            while($row = $result -> fetch_assoc()){

                ?>
                    <div class="row">
                        <div class="col-2 text-center">
                            <p> <?= $row['surname']  ?> </p>
                        </div>
                        <div class="col-2 text-center">
                            <p> <?= $row['name']  ?> </p>
                        </div>
                        <div class="col text-center">
                            <p> <?= $row['degree_name']  ?> </p>
                        </div>
                        <div class="col text-center">
                            <p> <?= $row['department_name']  ?> </p>
                        </div>
                    </div>
                <?php
            }
        }

    ?>

</body>
</html>

