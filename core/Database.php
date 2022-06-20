<?php


namespace core;

use core\Application;
use core\exception\ServerErrorException;
use PDO;
use PDOException;
require_once __DIR__. '/../vendor/autoload.php';

class Database
{
    public PDO $pdo;
    /**
     * Database constructor.
     */
    public function __construct()
    {
        try {
            $this->pdo= new PDO('mysql:host=localhost;dbname=proiecttw', 'root', 'root');
            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully\n";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }
    public function applyMigrations(): void
    {
        $this->createMigrationTable();
        $appliedMigrations=$this->getAppliedMigrations();

        $newMigrations=[];
        $files=scandir(Application::$ROOT_DIR.'/migrations');

        $toApplyMigrations=array_diff($files,$appliedMigrations);
        foreach ($toApplyMigrations as $migration){
            if($migration==='.' || $migration==='..'){
                continue;
            }

            require_once Application::$ROOT_DIR.'\migrations\\'.$migration;
            $className=pathinfo($migration,PATHINFO_FILENAME); //name of class without extension
            $this->log(Application::$ROOT_DIR.'\migrations\\'.$migration);
            $instance= new $className;
            $this->log("Applying migration $migration");
            $instance->up();
            $this->log("Applied migration $migration");
            $newMigrations[]=$migration;
        }
        if(!empty($newMigrations)){
            var_dump($newMigrations);
            $this->saveMigrations($newMigrations);
        }
        else{
            $this->log("All migrations are applied");
        }
    }
    public function createMigrationTable(): void
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
            ) ENGINE=INNODB;");


    }
    public function getAppliedMigrations(): array
    {
        $statement=$this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }
    public function saveMigrations(array $migrations): void
    {
        $str=implode(",",array_map(fn($m)=>"('$m')",$migrations));
        $statement=$this->pdo->prepare("INSERT INTO migrations (migration) VALUES $str");
        $statement->execute();
    }
    public function insert(string $table_name, array $input): void
    {
        $SQL_fields ='';
        $SQL_values='';
        foreach($input as $key=>$value)
            if($value!='' && !str_starts_with($key, 'tags')){
                $SQL_fields .= $key.', ';
                $SQL_values .= "'".$value."', ";
            }
        $SQL_fields=substr($SQL_fields,0,-2);
        $SQL_values=substr($SQL_values,0,-2);
        $SQL = "INSERT INTO $table_name ($SQL_fields) VALUES($SQL_values)";
        echo $SQL;
        $statement=$this->pdo->prepare($SQL);
        $statement->execute();
    }

    /**
     * @throws ServerErrorException
     */
    public function select($table_name, $input, $row_name)
    {
        $SQL_after_where = '';
        foreach ($input as $key => $value) {
            if ($value != '' && !str_starts_with($key, 'tags')) {
                $SQL_after_where .= $key . " = '" . $value . "' AND ";
            }
        }
        $SQL_after_where = substr($SQL_after_where, 0, -5);
        $SQL = "SELECT $row_name FROM $table_name WHERE $SQL_after_where";
//        echo $SQL;
        try{
            $statement = $this->pdo->query($SQL);
            while ($row = $statement->fetch()) {
                if ($row_name == '*' || str_contains($row_name,',')) { //returns an array of key value pairs
                    return $row;
                }
                else //returns only the wanted row_name
                    return $row[$row_name];
            }

        }catch(PDOException $e){
            throw new ServerErrorException();
        }
    return null;
    }

    public function prepare($sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }
    protected function log($message): void
    {
        echo '['.date('Y-m-d H:i:s').'] - '.$message.PHP_EOL;
    }
}