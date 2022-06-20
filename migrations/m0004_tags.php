<?php

use core\Application;

class m0004_tags
{
    public function up()
    {
        $db= Application::$app->db;
        $SQL="CREATE TABLE tags(
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                UNIQUE(name)
)ENGINE=INNODB";
        $db->pdo->exec($SQL);

    }

    public function down()
    {
        $db= Application::$app->db;
        $SQL="DROP TABLE tags";
        $db->pdo->exec($SQL);

    }

}