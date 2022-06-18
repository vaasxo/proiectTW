<?php

use core\Application;

class m0005_autograph_tags
{
    public function up()
    {
        $db= Application::$app->db;
        $SQL="CREATE TABLE autograph_tags(
           autograph_id INT,
           tag_id INT, 
           FOREIGN KEY(autograph_id) REFERENCES autographs(id),
           FOREIGN KEY(tag_id) REFERENCES tags(id),
           PRIMARY KEY(autograph_id, tag_id)
)ENGINE=INNODB";
        $db->pdo->exec($SQL);

    }

    public function down()
    {
        $db= Application::$app->db;
        $SQL="DROP TABLE autograph_tags";
        $db->pdo->exec($SQL);

    }

}