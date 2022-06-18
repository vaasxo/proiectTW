<?php

use core\Application;

class m0007_users_add_picture{
    public function up()
    {
        $db= Application::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN image BLOB");
    }

    public function down()
    {
        $db= Application::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN image BLOB");

    }
}