<?php


namespace core;
use models\UserWorkoutModel;
use PDO;


abstract class DBModel extends Model
{
    abstract public function getTableName(): string;

    abstract public function getAttributes(): array;

    abstract public function getPrimaryKey(): string;

    public function save(): bool
    {
        $tableName = $this->getTableName();
        $attributes = $this->getAttributes();
        $params = array_map(fn($attr)=>":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (".implode(',',$attributes).")
                VALUES(".implode(',',$params).")");
        foreach ($attributes as $attribute)
        {
            $statement->bindValue(":$attribute",$this->{$attribute});
        }
        $statement->execute();
        return true;
    }
    public function remove(): bool{
        $tableName = $this->getTableName();
        $id_user=Application::$app->session->get('user');
        $statement=self::prepare("DELETE FROM $tableName WHERE id_user=$id_user");
        $statement->execute();
        return true;
    }

    public function findOne($where)
    {
        $tableName = static::getTableName(); //can't call self, Abstract class
        $attributes = array_keys($where);
        $sql = implode("AND ",array_map(fn($attr)=> "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public function update($vkey){
        $tableName = $this->getTableName();
        $statement = self::prepare("SELECT email FROM $tableName WHERE vkey = \"$vkey\"");
        $statement->execute();
        $user = $statement->fetchObject(static::class);
        $email = $user->getEmail();
        //echo $statement->fetchObject(static::class);

        $statement = self::prepare("UPDATE $tableName SET status = 1 WHERE email = \"$email\"");
        $statement->execute();
    }

    public function findAll($where)
    {
        $tableName = static::getTableName();
        $attributes = array_keys($where);
        $sql = implode("AND ",array_map(fn($attr)=> "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}