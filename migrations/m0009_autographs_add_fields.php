<?php

use core\Application;

class m0009_autographs_add_fields{
    public function up()
    {
        $db= Application::$app->db;
        $db->pdo->exec("ALTER TABLE autographs ADD COLUMN marketplace VARCHAR(255)");
        $db->pdo->exec("ALTER TABLE autographs ADD COLUMN trading VARCHAR(255) AFTER marketplace");
    }

    public function down()
    {
        $db= Application::$app->db;
        $db->pdo->exec("ALTER TABLE autographs ADD COLUMN marketplace VARCHAR(255)");
        $db->pdo->exec("ALTER TABLE autographs ADD COLUMN trading VARCHAR(255) AFTER marketplace");

    }
}