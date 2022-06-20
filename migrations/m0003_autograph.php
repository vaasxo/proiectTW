<?php

use core\Application;

class m0003_autograph
{
    public function up()
    {
        $db= Application::$app->db;
        $SQL="CREATE TABLE autographs (
                id INT AUTO_INCREMENT PRIMARY KEY,
                personality VARCHAR(255) NOT NULL,
                field VARCHAR(255) NOT NULL,
                context VARCHAR(255) NOT NULL,
                location VARCHAR(255) NOT NULL,
                object VARCHAR(255) NOT NULL,
                mentions VARCHAR(255),
                measures VARCHAR(255) NOT NULL,
                price INT NOT NULL,
                image BLOB NOT NULL
)ENGINE=INNODB";
        $db->pdo->exec($SQL);

    }

    public function down()
    {
        $db= Application::$app->db;
        $SQL="DROP TABLE autographs";
        $db->pdo->exec($SQL);

    }

}