<?php

class DatabaseConnection
{
    public function connect()
    {
        $servername = "35.203.47.121";
        $username = "budgetit";
        $password = "RootPasswordBudgetiT";
        $dbname = "project";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();

        }
        return $conn;
    }
}
