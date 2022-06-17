<?php

use core\Application;

class m0003_workout_initial
{
    public function up()
    {
        $db= Application::$app->db;
        $SQL="CREATE TABLE workouts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                duration VARCHAR(255) NOT NULL,
                type VARCHAR(255) NOT NULL,
                difficulty VARCHAR(255) NOT NULL,
                calorie_min VARCHAR(255) NOT NULL,
                calorie_avg VARCHAR(255) NOT NULL,
                calorie_max VARCHAR(255) NOT NULL,
                image VARCHAR(255) NOT NULL,
                video VARCHAR(255) NOT NULL
)ENGINE=INNODB";
        $db->pdo->exec($SQL);
        
    }

    public function down()
    {
        $db= Application::$app->db;
        $SQL="DROP TABLE workouts";
        $db->pdo->exec($SQL);
        
    }

}