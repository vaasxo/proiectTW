<?php

use core\Application;

class m0008_autograph_modify_constraint{
    public function up()
    {
        $db= Application::$app->db;
        $db->pdo->exec("ALTER TABLE autographs MODIFY price INT, MODIFY measures VARCHAR(255)");
    }

    public function down()
    {
        $db= Application::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN image BLOB");

    }
}