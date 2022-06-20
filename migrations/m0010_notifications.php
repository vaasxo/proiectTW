<?php

use core\Application;

class m0010_notifications{
    public function up()
    {
        $db= Application::$app->db;
        $SQL="CREATE TABLE notifications (
                id INT AUTO_INCREMENT PRIMARY KEY,
                from_user INT NOT NULL,
                to_user INT NOT NULL,
                wanted_autographs VARCHAR(255) NOT NULL,
                bid INT,
                traded_autographs VARCHAR(255)
)ENGINE=INNODB";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db= Application::$app->db;
        $SQL="DROP TABLE notifications";
        $db->pdo->exec($SQL);
    }
}