<?php

use core\Application;

class m0001_initial{
    public function up()
    {
        $db= Application::$app->db;
        $SQL="CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                username VARCHAR(255),
                firstname VARCHAR(255),
                lastname VARCHAR(255),
                age INT,
                weight INT,
                birth_year INT,
                gender VARCHAR(255),
                height INT,
                achievements VARCHAR(255),
                workouts_completed INT,
                workout_streak INT, 
                status INT
)ENGINE=INNODB";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db= Application::$app->db;
        $SQL="DROP TABLE users";
        $db->pdo->exec($SQL);
    }
}