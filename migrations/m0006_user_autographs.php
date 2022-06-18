<?php

use core\Application;

class m0006_user_autographs
{
    public function up()
    {
        $db= Application::$app->db;
        $SQL="CREATE TABLE user_autographs(
               user_id INT,
               autograph_id INT,
               FOREIGN KEY(user_id) REFERENCES users(id),
               FOREIGN KEY(autograph_id) REFERENCES autographs(id),
               PRIMARY KEY(user_id, autograph_id)
)ENGINE=INNODB";
        $db->pdo->exec($SQL);

    }

    public function down()
    {
        $db= Application::$app->db;
        $SQL="DROP TABLE user_autographs";
        $db->pdo->exec($SQL);

    }

}