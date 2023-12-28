<?php 
require_once '../../private_dbconnection/config.php';

class Conexao
{
    protected $conn;

    protected function db_connect()
    {
        try {
            $this->conn = new \PDO('mysql:host=' . HOST.'; charset=utf8;dbname=' . DATABASE, USER, PASS);
        } catch (\Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    protected function db_close()
    {
        $this->conn = null;
    }
}