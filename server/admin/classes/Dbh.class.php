<?php

class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $password = "user";
    private $dbname = "appbdp";

    public function connect ()
    {
        try {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $pdo;
        } catch (PDOException $e) {
            echo "La connexion a échoué : ".$e->getMessage() . "<br/>";
            die();
        }

    }

}