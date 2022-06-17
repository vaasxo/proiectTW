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
    public function findWorkouts($activity,$type,$durationMin,$durationMax)
    {
        $tableName = static::getTableName();
        $sqlLike=[];
        foreach ($type as $value)
            array_push($sqlLike,"type LIKE '%$value%'");
        $sqlType=implode(" OR ",$sqlLike);
        $sqlEquals=[];
        foreach ($activity as $value)
            array_push($sqlEquals,"difficulty=$value");
        $sqlDifficulty=implode(" OR ",$sqlEquals);
        $sql="($sqlDifficulty) AND 
            duration>=$durationMin AND 
            duration<=$durationMax AND
            ($sqlType)";
        $statement=self::prepare("SELECT * FROM $tableName WHERE $sql");
        $statement->execute();
        $workout = $statement->fetchAll(PDO::FETCH_CLASS,static::class);


        $userWorkout=Application::$app->userWorkoutClass;
        $userWorkout->id_user=Application::$app->session->get('user');
        Application::$app->session->set('workouts',$workout);
        foreach($workout as $key=>$value){
            $userWorkout->id_workout=$value->id;
            $userWorkout->save();
        }

    }
}