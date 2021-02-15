<?php
namespace Models;

abstract class ClassConecta{

    protected function conectaDB()
    {
        try{
            $con=new \PDO("mysql:host=".HOST.";dbname=".DB."","".USER."","".PASS."");
            return $con;
        }catch (\PDOException $erro){
            throw new \PDOException($erro);
        }
    }
}

